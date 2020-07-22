<table class="table table-hover rounded table-bordered">
    <thead class="bg-custom rounded-top">
        <tr>
            <th scope="col" class="text-white">
                <small>
                    Serial
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Datetime
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Number
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Surname
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Firstname
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Phone
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Age
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Gender
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Referer
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Delete
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Edit
                </small>
            </th>
        </tr>
    </thead>
    <tbody class="border-top-0">
        <?php $counter = 1; ?>
        <?php foreach($patients as $patient): ?>
            <tr class="cursor-pointer border-top-0">
                <td>
                    <small class="text-muted">
                        <?= $counter++; ?>
                    </small>
                </td>
                <td>
                    <small class="text-muted">
                        <?= Application\Core\Help::formatDatetime($patient->date); ?>
                    </small>
                </td>
                <td>
                    <a href="<?= DOMAIN; ?>/patients/patient/<?= $patient->id; ?>" class="text-primary">
                        <small class="">
                            <?= $patient->number; ?>
                        </small>
                    </a>
                </td>
                <td>
                    <small class="text-muted">
                        <?= $patient->surname; ?>
                    </small>
                </td>
                <td>
                    <small class="text-muted">
                        <?= $patient->firstname; ?>
                    </small>
                </td>
                <td>
                    <a href="javascript:;">
                        <small class="text-primary">
                            <?= $patient->phone; ?>
                        </small>
                    </a>
                </td>
                <td>
                    <small class="text-muted">
                        <?= $patient->age; ?>years
                    </small>
                </td>
                <td>
                    <small class="text-muted">
                        <?= $patient->gender; ?>
                    </small>
                </td>
                <td>
                    <small class="text-muted">
                        <?= $patient->name; ?>
                    </small>
                </td>
                <td> 
                    <a href="javascript:;" class="delete-patient text-danger" data-url="<?= DOMAIN; ?>/patient/delete/<?= $patient->id; ?>">
                        <small><i class="icofont-ui-delete"></i></small>
                    </a>
                </td>
                <td>
                    <a href="javascript:;" class="edit-patient text-muted font-weight-normal" data-url="<?= DOMAIN; ?>/patient/edit/<?= $patient->id; ?>" data-toggle="modal" data-target="#edit-patient-<?= $patient->id; ?>">
                        <small><i class="icofont-ui-edit font-weight-lighter"></i></small>
                    </a>
                </td>
            </tr>
        <?php endforeach; ?>
    </tbody>
    <tfoot class="bg-custom">
        <tr>
            <th scope="col" class="text-white">
                <small>
                    Serial
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Datetime
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Number
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Surname
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Firstname
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Phone
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Age
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Gender
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Referer
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Delete
                </small>
            </th>
            <th scope="col" class="text-white">
                <small>
                    Edit
                </small>
            </th>
        </tr>
    </tfoot>
</table>