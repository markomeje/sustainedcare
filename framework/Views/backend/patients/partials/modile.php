<?php foreach ($patients as $patient): ?>
    <div class="col-12 col-md-4 col-lg-3 mb-4">
        <div class="card box-shadow border-0">
            <div class="card-body">
                <div class="d-flex justify-content-between align-items-center">
                    <a href="<?= DOMAIN; ?>/patients/patient/<?= $patient->id; ?>" class="text-muted">
                        <small class="font-weight-bold">
                            <?= Application\Core\Help::limitStringLength(ucwords($patient->surname." ".$patient->firstname), 20); ?>
                        </small>
                    </a>
                    <div class="dropdown dropleft">
                        <div class="dropdown-toggle text-muted cursor-pointer" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        </div>
                        <div class="dropdown-menu dropdown-menu-left border-0 box-shadow py-0">
                            <small class="dropdown-item text-muted cursor-pointer">Delete</small>
                            <div class="dropdown-divider"></div>
                            <small class="dropdown-item text-muted cursor-pointer">Edit</small>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-between align-items-center">
                    <a href="javascript:;" class="text-muted">
                        <small class="">
                            <?= $patient->phone; ?>
                        </small>
                    </a>
                    <small class="text-success">
                        <?= $patient->number; ?>
                    </small> 
                </div>
            </div>
            <div class="card-footer bg-custom border-top-custom">
                <small class="text-white">
                    <?= Application\Core\Help::formatDatetime($patient->date); ?>
                </small>
            </div>
        </div>
    </div>
<?php endforeach; ?>