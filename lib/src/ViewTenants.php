<?php

namespace app\src;

use app\assets\DB;

class ViewTenants
{
    private $ownerID;
    private $con;

    public function __construct()
    {
        $this->ownerID = $_SESSION['id'];
        $this->con = DB::getInstance();
    }

    /**
     * Showa the list of tenants for a particular property owner
     */
    public function showTenants()
    {
        $tenants = $this->con->select("tenant_name, agreement_date, property_bought, property_id", "tenants", "WHERE landlord = ? ORDER BY id DESC", $this->ownerID);

        if ($tenants->num_rows < 1) : ?>
            <p class="font-bold">
                You do not have any tenant(s) yet.
            </p>
        <?php
            return;
        endif;
        ?>
        <table class="w-full border-separate whitespace-nowrap table-auto mb-2">
            <thead class="text-left border border-slate-600">
                <tr class="text-sm">
                    <th class="py-4 px-4 border border-slate-600 header">
                        Tenant's Name
                    </th>
                    <th class="py-4 px-4 border border-slate-600 header">
                        Agreement Date
                    </th>
                    <th class="py-4 px-4 border border-slate-600 header">
                        Property Bought
                    </th>
                    <th class="py-4 px-4 border border-slate-600 header">
                        Property ID
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
                            <?= $tenant->agreement_date ?>
                        </td>
                        <td class="py-2 px-4 border border-slate-600">
                            <?= $tenant->property_bought ?>
                        </td>
                        <td class="py-2 px-4 border border-slate-600">
                            <?= $tenant->property_id ?>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
<?php
    }
}
