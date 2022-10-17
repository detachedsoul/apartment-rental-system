<?php

namespace app\src;

use app\assets\DB;

class ViewTransactionHistory
{
    private $ownerID;
    private $con;

    public function __construct()
    {
        $this->ownerID = $_SESSION['id'];
        $this->con = DB::getInstance();
    }

    /**
     * Shows the list of tenants for a particular property owner
     */
    public function showTransactionHistory()
    {
        $sql = "SELECT buyer_name, payment_date, property_id, amount FROM `transaction` t JOIN landlords l WHERE l.id = ? ORDER BY t.id DESC";

        $transactions = $this->con->prepare($sql, "s", $this->ownerID);

        if ($transactions->num_rows < 1) : ?>
            <p class="font-bold">
                You do not have any transaction yet.
            </p>
        <?php
            return;
        endif;
        ?>
        <table class="w-full border-separate whitespace-nowrap table-auto mb-2">
            <thead class="text-left border border-slate-600">
                <tr class="text-sm">
                    <th class="py-4 px-4 border border-slate-600 header">
                        Buyer's Name
                    </th>
                    <th class="py-4 px-4 border border-slate-600 header">
                        Payment Date
                    </th>
                    <th class="py-4 px-4 border border-slate-600 header">
                        Property Amount
                    </th>
                    <th class="py-4 px-4 border border-slate-600 header">
                        Property ID
                    </th>
                    <th class="py-4 px-4 border border-slate-600 header">
                        Status
                    </th>
                    <th class="py-4 px-4 border border-slate-600 header hidden">
                        Action
                    </th>
                </tr>
            </thead>

            <tbody>
                <?php while ($transaction = $transactions->fetch_object()) : ?>
                    <tr class="odd:bg-white even:bg-slate-50 hover:bg-slate-50 dark:odd:bg-slate-700 dark:even:bg-slate-800 dark:hover:bg-slate-800">
                        <td class="py-2 px-4 border border-slate-600">
                            <?= $transaction->buyer_name ?>
                        </td>
                        <td class="py-2 px-4 border border-slate-600">
                            <?= $transaction->payment_date ?>
                        </td>
                        <td class="py-2 px-4 border border-slate-600">
                            ₦ <?= number_format($transaction->amount) ?>
                        </td>
                        <td class="py-2 px-4 border border-slate-600">
                            <?= $transaction->property_id ?>
                        </td>
                        <td class="py-2 px-4 border border-slate-600 text-green-500">
                            Paid
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php
    }

    public function showIndexTransactions()
    {
        $sql = "SELECT buyer_name, payment_date, t.property_id, amount FROM `transaction` t JOIN tenants f ON t.tenant_id = f.id WHERE f.landlord = ? ORDER BY t.id DESC LIMIT 3 ";

        $transactions = $this->con->prepare($sql, "s", $this->ownerID);

        if ($transactions->num_rows < 1) : ?>
            <p class="font-bold grid">
                You do not have any transaction yet.
            </p>
        <?php
            return;
        endif;
        ?>
        <table class="w-full border-separate whitespace-nowrap table-auto mb-2">
            <thead class="text-left border border-slate-600">
                <tr class="text-sm">
                    <th class="py-4 px-4 border border-slate-600 header">
                        Property ID
                    </th>
                    <th class="py-4 px-4 border border-slate-600 header">
                        Tenant Name
                    </th>
                    <th class="py-4 px-4 border border-slate-600 header">
                        Payment Date
                    </th>
                    <th class="py-4 px-4 border border-slate-600 header">
                        Amount
                    </th>
                    <th class="py-4 px-4 border border-slate-600 header">
                        Status
                    </th>
                </tr>
            </thead>

            <tbody>
                <?php while ($transaction = $transactions->fetch_object()) : ?>
                    <tr class="odd:bg-white even:bg-slate-50 hover:bg-slate-50 dark:odd:bg-slate-700 dark:even:bg-slate-800 dark:hover:bg-slate-800">
                        <td class="py-2 px-4 border border-slate-600">
                            <?= $transaction->property_id ?>
                        </td>
                        <td class="py-2 px-4 border border-slate-600">
                            <?= $transaction->buyer_name ?>
                        </td>
                        <td class="py-2 px-4 border border-slate-600">
                            <?= $transaction->payment_date ?>
                        </td>
                        <td class="py-2 px-4 border border-slate-600">
                            ₦ <?= number_format($transaction->amount) ?>
                        </td>
                        <td class="py-2 px-4 border border-slate-600 text-green-500">
                            Paid
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <?php
    }

    public function showIndexTenants()
    {
        $tenants = $this->con->select("tenant_name, property_bought, agreement_date, property_id", "tenants", "WHERE landlord = ? ORDER BY id DESC LIMIT 3", $this->ownerID);

        if ($tenants->num_rows < 1) : ?>
            <p class="font-bold grid">
                You do not have any tenant yet.
            </p>
        <?php
            return;
        endif;
        ?>
        <table class="w-full border-separate whitespace-nowrap table-auto mb-2">
            <thead class="text-left border border-slate-600">
                <tr class="text-sm">
                    <th class="py-4 px-4 border border-slate-600 header">
                        Tenant Name
                    </th>
                    <th class="py-4 px-4 border border-slate-600 header">
                        Property
                    </th>
                    <th class="py-4 px-4 border border-slate-600 header">
                        Agreement Date
                    </th>
                    <th class="py-4 px-4 border border-slate-600 header">
                        Status
                    </th>
                </tr>
            </thead>

            <tbody>
                <?php while ($tenant = $tenants->fetch_object()) : ?>
                    <tr class="odd:bg-white even:bg-slate-50 hover:bg-slate-50 dark:odd:bg-slate-700 dark:even:bg-slate-800 dark:hover:bg-slate-800">
                        <td class="py-2 px-4 border border-slate-600">
                            <?= $tenant->tenant_name ?>
                        </td>
                        <td class="py-2 px-4 border border-slate-600">
                            <?= $tenant->property_bought ?>
                        </td>
                        <td class="py-2 px-4 border border-slate-600">
                            <?= $tenant->agreement_date ?>
                        </td>
                        <td class="py-2 px-4 border border-slate-600 text-green-500">
                            Successful
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
<?php
    }
}
