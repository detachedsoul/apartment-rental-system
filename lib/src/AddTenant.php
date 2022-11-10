<?php

namespace app\src;

use app\assets\DB;

class AddTenant
{
    private $con;
    private $ownerID;
    private $tenantName;
    private $agreementDate;
    private $propertyBought;
    private $amountPaid;
    private $userEmail;

    public function __construct()
    {
        $this->con = DB::getInstance();
        $this->ownerID = $_SESSION['id'];

        $this->tenantName = isset($_POST['tenant-name']) ? ucwords(strtolower(trim(strip_tags($_POST['tenant-name'])))) : "";

        $this->agreementDate = isset($_POST['agreement-date']) ? date('F d, Y', strtotime($_POST['agreement-date'])) : "";

        $this->propertyBought = isset($_POST['property-bought']) ? ucwords(strtolower(trim(strip_tags($_POST['property-bought'])))) : "";

        $this->amountPaid = isset($_POST['amount-paid']) ? strtolower(trim(strip_tags($_POST['amount-paid']))) : "";

        $this->userEmail = isset($_POST['user-email']) ? strtolower(trim(strip_tags($_POST['user-email']))) : "";
    }

    // Get all properties for a particular apartment owner
    public function getProperties()
    {

        $properties = $this->con->select("id, title, owner_id", "properties", "WHERE owner_id = ? AND status = 'available' ORDER BY id DESC", $this->ownerID);

        return $properties;
    }

    // Add a new tenant
    public function addNewTenant()
    {
        if ($this->getProperties()->num_rows < 1) {
            displayMessage("You do not have any property yet. Upload a property to attract potential tenants.", "header text-xl lg:col-span-12 text-center mb-4 text-rose-500 dark:text-rose-500", "h3");

            return;
        }

        if (isset($_POST['add-tenant'])) {
            $property = $this->getProperties();

            $fields = [
                $this->tenantName,
                $this->agreementDate,
                $this->propertyBought,
                $this->amountPaid,
                $this->userEmail,
            ];

            foreach ($fields as $field) {
                if (is_empty($field)) {
                    displayMessage("All fields are required. Please <a class='text-sky-500 hover:underline focus:underline underline-offset-[7px]' href='/admin/add-tenant'>try again</a>", "header text-xl text-center mb-4 lg:col-span-12 text-rose-500 dark:text-rose-500");

                    return;
                }
            }

            if (!filter_var($this->userEmail, FILTER_VALIDATE_EMAIL)) {
                displayMessage("Invalid email address. Please <a class='text-sky-500 hover:underline focus:underline underline-offset-[7px]' href='/admin/add-tenant'>try again</a> using a valid email", "header text-xl text-center mb-4 lg:col-span-12 text-rose-500 dark:text-rose-500");

                return;
            }

            $getSpecificID = $this->con->select("id", "properties", "WHERE title = ? AND owner_id = ? AND status = 'available'", ...[$this->propertyBought, $this->ownerID])->fetch_object()->id;

            // Get the email of the property owner
            $getPropertyOwnerEmail = $this->con->select("email", "landlords", "JOIN properties ON landlords.id = properties.owner_id WHERE title = ? AND owner_id = ? AND status = 'available'", ...[$this->propertyBought, $this->ownerID])->fetch_object()->email;

            // Send a confirmation mail and then update the records accordingly
            $subject = "Property Allocation Successful";
            $amountPaid = number_format($this->amountPaid);
            $message = "
                <html>
                    <head>
                        <title>Property Allocation Successful</title>
                    </head>
                    <body>
                        <p>
                            It is my pleasure to inform you that your transaction was successful. You can now move in to your apartment whenever you feel like. Enjoy your stay!
                        </p>

                        <p>
                            Your transaction details are as follows:
                        </p>

                        <div style='display: grid; grid-template-columns: repeat(3, 4fr); gap: 1rem'>
                            <div>
                                <h2>Property ID</h2>
                                <p>{$getSpecificID}</p>
                            </div>
                            <div>
                                <h2>Property Owner</h2>
                                <p>{$_SESSION['user']}</p>
                            </div>

                            <div>
                                <h2>Property Bought</h2>
                                <p>{$this->propertyBought}</p>
                            </div>

                            <div>
                                <h2>Customer Name</h2>
                                <p>{$this->tenantName}</p>
                            </div>

                            <div>
                                <h2>Amount Paid</h2>
                                <p>{$amountPaid}</p>
                            </div>

                            <div>
                                <h2>Agreement Date</h2>
                                <p>{$this->agreementDate}</p>
                            </div>
                        </div>
                    </body>
                </html>
            ";

            $message = wordwrap($message, 70);
            $headers = "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";
            $headers .= "From: {$_SESSION['user']} {$getPropertyOwnerEmail}";

            if (mail($this->userEmail, $subject, $message, $headers)) {
                $addTenant = $this->con->insert("tenants", ["tenant_name", "agreement_date", "property_bought", "property_id", "landlord"], ...[$this->tenantName, $this->agreementDate, $this->propertyBought, $getSpecificID, $this->ownerID]);

                $tenantID = $this->con->lastID();

                $addTransactionHistory = $this->con->insert("transaction", ["buyer_name", "payment_date", "amount", "property_id", "tenant_id"], ...[$this->tenantName, $this->agreementDate, $this->amountPaid, $getSpecificID, $tenantID]);

                $this->con->update("properties", "status = 'taken'", "WHERE id = ?", ...[$getSpecificID]);

                displayMessage("Tenant added successfully.", "text-green-500 header text-xl text-center mb-4 lg:col-span-12 dark:text-green-500");

                header("Refresh: 3, /admin/tenants", true, 301);
            } else {
                displayMessage("There was an error completing this operation. Please <a class='text-sky-500 hover:underline focus:underline underline-offset-[7px]' href='/admin/add-tenant'>try again</a>", "header text-xl text-center mb-4 lg:col-span-12 text-rose-500 dark:text-rose-500");
            }

        } else {
            $this->getTenantForm();
        }
    }

    public function getTenantForm()
    {
        $property = $this->getProperties();
?>

        <h3 class="header text-xl text-center mb-4 lg:col-span-12">
            Add New Tenant
        </h3>

        <label class="flex items-center bg-white text-slate-900 rounded-lg lg:col-span-6 dark:bg-slate-900 dark:text-slate-400 shadow-sm border-1 border-slate-100" for="tenant-name">
            <span class="rounded-l-lg pl-4">
                <i class="fr fi-rr-user relative top-0.5"></i>
            </span>

            <input class="rounded-r-lg input pl-2 bg-white" type="text" placeholder="Tenant name" name="tenant-name" required id="tenant-name" autocomplete="off" value="<?= $this->tenantName ?>" />
        </label>

        <label class="flex items-center bg-white text-slate-900 rounded-lg lg:col-span-6 dark:bg-slate-900 dark:text-slate-400 shadow-sm border-1 border-slate-100" for="agreement-date">
            <span class="rounded-l-lg pl-4">
                <i class="fr fi-rr-handshake relative top-0.5"></i>
            </span>

            <input class="rounded-r-lg input pl-2 bg-white" type="date" placeholder="Agreement date" name="agreement-date" required id="agreement-date" autocomplete="off" />
        </label>

        <label class="flex items-center bg-white text-slate-900 rounded-lg lg:col-span-6 dark:bg-slate-900 dark:text-slate-400 shadow-sm border-1 border-slate-100" for="amount-paid">
            <span class="rounded-l-lg pl-4">
                <i class="fr fi-rr-money relative top-0.5"></i>
            </span>

            <input class="rounded-r-lg input pl-2 bg-white" type="number" placeholder="Amount Paid" name="amount-paid" required id="amount-paid" autocomplete="off" value="<?= $this->amountPaid ?>" />
        </label>

        <label class="flex items-center bg-white text-slate-900 rounded-lg lg:col-span-6 dark:bg-slate-900 dark:text-slate-400 shadow-sm border-1 border-slate-100" for="user-email">
            <span class="rounded-l-lg pl-4">
                <i class="fr fi-rr-at relative top-0.5"></i>
            </span>

            <input class="rounded-r-lg input pl-2 bg-white" placeholder="User Email" name="user-email" id="user-email" autocomplete="off" value="<?= $this->userEmail ?>" />
        </label>

        <label class="flex items-center bg-white text-slate-900 rounded-lg lg:col-span-12 dark:bg-slate-900 dark:text-slate-400 shadow-sm border-1 border-slate-100" for="property-bought">
            <select class="form-select bg-transparent focus:bg-inherit focus:bg-slate-100 dark:focus:bg-slate-900 border-none rounded-lg focus:ring-transparent w-full" name="property-bought" id="property-bought">
                <?php while ($propertyName = $property->fetch_object()) : ?>
                    <option class="bg-white dark:bg-transparent" value="<?= $propertyName->title ?>"><?= $propertyName->title ?></option>
                <?php endwhile;
                ?>
            </select>
        </label>

        </div>

        <button class="bg-sky-500 hover:bg-sky-600 focus:bg-sky-600 py-1.5 w-auto px-4 text-white rounded-lg lg:col-span-12 mt-4 dark:bg-sky-600 dark:hover:bg-sky-700 dark:focus:bg-sky-700 hover:ring-1 hover:ring-sky-500 ring-offset-2 active:ring-1 active:ring-sky-500 dark:ring-offset-slate-800" type="submit" name="add-tenant">
            Add Tenant
        </button>
<?php
    }
}
