<?php
    $chatgpt_key = App\Models\Utility::getValByName('chatgpt_key');
    $chatgpt_enable = !empty($chatgpt_key);
    $languages = \App\Models\Utility::languages();
    $lang = isset($currEmailTempLang->lang) ? $currEmailTempLang->lang : 'en';
    if ($lang == null) {
        $lang = 'en';
    }
    $LangName = $currEmailTempLang->language;
?>

<?php $__env->startSection('page-title'); ?>
    <?php echo e(__('Manage Email Templates')); ?>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('breadcrumb'); ?>
    <li class="breadcrumb-item"><a href="<?php echo e(route('dashboard')); ?>"><?php echo e(__('Home')); ?></a></li>
    <li class="breadcrumb-item active" aria-current="page"><?php echo e(__('Email Template')); ?></li>
<?php $__env->stopSection(); ?>
<?php $__env->startPush('css-page'); ?>
    <link rel="stylesheet" href="<?php echo e(asset('css/summernote/summernote-bs4.css')); ?>">
<?php $__env->stopPush(); ?>
<?php $__env->startPush('script-page'); ?>
    <script src="<?php echo e(asset('css/summernote/summernote-bs4.js')); ?>"></script>
<?php $__env->stopPush(); ?>
<?php $__env->startSection('action-button'); ?>
    <?php if($chatgpt_enable): ?>
        <div class="text-end mb-2">
            <a href="#" class="btn btn-sm btn-primary" data-size="medium" data-ajax-popup-over="true"
                data-url="<?php echo e(route('generate', ['email template'])); ?>" data-bs-toggle="tooltip" data-bs-placement="top"
                title="<?php echo e(__('Generate')); ?>" data-title="<?php echo e(__('Generate Content With AI')); ?>">
                <i class="fas fa-robot"></i><?php echo e(__(' Generate With AI')); ?>

            </a>
        </div>
    <?php endif; ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('content'); ?>
    <div class="row invoice-row">
        <div class="col-md-4 col-12">
            <div class="card mb-0 h-100">
                <div class="card-header card-body">
                    <h5></h5>
                    <?php echo e(Form::model($emailTemplate, ['route' => ['email_template.update', $emailTemplate->id], 'method' => 'PUT'])); ?>

                    <div class="row">
                        <div class="form-group col-md-12">
                            <?php echo e(Form::label('name', __('Name'), ['class' => 'col-form-label text-dark'])); ?>

                            <?php echo e(Form::text('name', null, ['class' => 'form-control font-style', 'disabled' => 'disabled'])); ?>

                        </div>
                        <div class="form-group col-md-12">
                            <?php echo e(Form::label('from', __('From'), ['class' => 'col-form-label text-dark'])); ?>

                            <?php echo e(Form::text('from', null, ['class' => 'form-control font-style', 'required' => 'required', 'placeholder' => __('Enter From Name')])); ?>

                        </div>
                        <?php echo e(Form::hidden('lang', $currEmailTempLang->lang, ['class' => ''])); ?>

                        <div class="col-12 text-end">
                            <input type="submit" value="<?php echo e(__('Save')); ?>"
                                class="btn btn-print-invoice  btn-primary m-r-10">
                        </div>
                    </div>
                    <?php echo e(Form::close()); ?>

                </div>
            </div>
        </div>
        <div class="col-md-8 col-12">
            <div class="card mb-0 h-100">
                <div class="card-header card-body">
                    <h5></h5>
                    <div class="row text-xs">

                        <h6 class="font-weight-bold mb-4"><?php echo e(__('Variables')); ?></h6>
                        <?php if($emailTemplate->slug == 'new_user'): ?>
                            <div class="row">
                                
                                <p class="col-6"><?php echo e(__('App Name')); ?> : <span
                                        class="pull-end text-primary">{app_name}</span></p>
                                <p class="col-6"><?php echo e(__('Company Name')); ?> : <span
                                        class="pull-right text-primary">{company_name}</span></p>
                                <p class="col-6"><?php echo e(__('App Url')); ?> : <span
                                        class="pull-right text-primary">{app_url}</span></p>
                                <p class="col-6"><?php echo e(__('Email')); ?> : <span
                                        class="pull-right text-primary">{email}</span></p>
                                <p class="col-6"><?php echo e(__('Password')); ?> : <span
                                        class="pull-right text-primary">{password}</span></p>
                            </div>
                        <?php elseif($emailTemplate->slug == 'new_employee'): ?>
                            <div class="row">
                                
                                <p class="col-6"><?php echo e(__('App Name')); ?> : <span
                                        class="pull-end text-primary">{app_name}</span></p>
                                <p class="col-6"><?php echo e(__('Company Name')); ?> : <span
                                        class="pull-right text-primary">{company_name}</span></p>
                                <p class="col-6"><?php echo e(__('App Url')); ?> : <span
                                        class="pull-right text-primary">{app_url}</span></p>
                                <p class="col-6"><?php echo e(__('Employee Name')); ?> : <span
                                        class="pull-right text-primary">{employee_name}</span></p>
                                <p class="col-6"><?php echo e(__('Password')); ?> : <span
                                        class="pull-right text-primary">{employee_password}</span></p>
                                <p class="col-6"><?php echo e(__('Employee Email')); ?> : <span
                                        class="pull-right text-primary">{employee_email}</span></p>
                                <p class="col-6"><?php echo e(__('Employee Branch')); ?> : <span
                                        class="pull-right text-primary">{employee_branch}</span></p>
                                <p class="col-6"><?php echo e(__('Employee Department')); ?> : <span
                                        class="pull-right text-primary">{employee_department}</span></p>
                                <p class="col-6"><?php echo e(__('Employee Designation')); ?> : <span
                                        class="pull-right text-primary">{employee_designation}</span></p>
                            </div>
                        <?php elseif($emailTemplate->slug == 'new_payroll'): ?>
                            <div class="row">

                                
                                <p class="col-6"><?php echo e(__('App Name')); ?> : <span
                                        class="pull-end text-primary">{app_name}</span></p>
                                <p class="col-6"><?php echo e(__('Company Name')); ?> : <span
                                        class="pull-right text-primary">{company_name}</span></p>
                                <p class="col-6"><?php echo e(__('Employee Email')); ?> : <span
                                        class="pull-right text-primary">{payslip_email}</span></p>
                                <p class="col-6"><?php echo e(__('App Url')); ?> : <span
                                        class="pull-right text-primary">{app_url}</span></p>
                                <p class="col-6"><?php echo e(__('Employee Name')); ?> : <span
                                        class="pull-right text-primary">{name}</span></p>
                                <p class="col-6"><?php echo e(__('Salary Month')); ?> : <span
                                        class="pull-right text-primary">{salary_month}</span></p>
                                <p class="col-6"><?php echo e(__('URL')); ?> : <span class="pull-right text-primary">{url}</span>
                                </p>

                            </div>
                        <?php elseif($emailTemplate->slug == 'new_ticket'): ?>
                            <div class="row">
                                
                                <p class="col-6"><?php echo e(__('App Name')); ?> : <span
                                        class="pull-end text-primary">{app_name}</span></p>
                                <p class="col-6"><?php echo e(__('Company Name')); ?> : <span
                                        class="pull-right text-primary">{company_name}</span></p>
                                <p class="col-6"><?php echo e(__('App Url')); ?> : <span
                                        class="pull-right text-primary">{app_url}</span></p>
                                <p class="col-6"><?php echo e(__('Ticket Title')); ?> : <span
                                        class="pull-right text-primary">{ticket_title}</span></p>
                                <p class="col-6"><?php echo e(__('Ticket Employee Name')); ?> : <span
                                        class="pull-right text-primary">{ticket_name}</span></p>
                                <p class="col-6"><?php echo e(__('Ticket Code')); ?> : <span
                                        class="pull-right text-primary">{ticket_code}</span></p>
                                <p class="col-6"><?php echo e(__('Ticket Description')); ?> : <span
                                        class="pull-right text-primary">{ticket_description}</span></p>
                            </div>
                        <?php elseif($emailTemplate->slug == 'new_award'): ?>
                            <div class="row">
                                
                                <p class="col-6"><?php echo e(__('App Name')); ?> : <span
                                        class="pull-end text-primary">{app_name}</span></p>
                                <p class="col-6"><?php echo e(__('Company Name')); ?> : <span
                                        class="pull-right text-primary">{company_name}</span></p>
                                <p class="col-6"><?php echo e(__('App Url')); ?> : <span
                                        class="pull-right text-primary">{app_url}</span></p>
                                <p class="col-6"><?php echo e(__('Employee Name')); ?> : <span
                                        class="pull-right text-primary">{award_name}</span></p>

                            </div>
                        <?php elseif($emailTemplate->slug == 'employee_transfer'): ?>
                            <div class="row">
                                
                                <p class="col-6"><?php echo e(__('App Name')); ?> : <span
                                        class="pull-end text-primary">{app_name}</span></p>
                                <p class="col-6"><?php echo e(__('Company Name')); ?> : <span
                                        class="pull-right text-primary">{company_name}</span></p>
                                <p class="col-6"><?php echo e(__('App Url')); ?> : <span
                                        class="pull-right text-primary">{app_url}</span></p>
                                <p class="col-6"><?php echo e(__('Employee Name')); ?> : <span
                                        class="pull-right text-primary">{transfer_name}</span></p>
                                <p class="col-6"><?php echo e(__('Transfer Date')); ?> : <span
                                        class="pull-right text-primary">{transfer_date}</span></p>
                                <p class="col-6"><?php echo e(__('Transfer Department')); ?> : <span
                                        class="pull-right text-primary">{transfer_department}</span></p>
                                <p class="col-6"><?php echo e(__('Transfer Branch')); ?> : <span
                                        class="pull-right text-primary">{transfer_branch}</span></p>
                                <p class="col-6"><?php echo e(__('Transfer Desciption')); ?> : <span
                                        class="pull-right text-primary">{transfer_description}</span></p>
                            </div>
                        <?php elseif($emailTemplate->slug == 'employee_resignation'): ?>
                            <div class="row">
                                
                                <p class="col-6"><?php echo e(__('App Name')); ?> : <span
                                        class="pull-end text-primary">{app_name}</span></p>
                                <p class="col-6"><?php echo e(__('Company Name')); ?> : <span
                                        class="pull-right text-primary">{company_name}</span></p>
                                <p class="col-6"><?php echo e(__('App Url')); ?> : <span
                                        class="pull-right text-primary">{app_url}</span></p>
                                <p class="col-6"><?php echo e(__('Employee Name')); ?> : <span
                                        class="pull-right text-primary">{assign_user}</span></p>
                                <p class="col-6"><?php echo e(__('Last Working Date')); ?> : <span
                                        class="pull-right text-primary">{resignation_date}</span></p>
                                <p class="col-6"><?php echo e(__('Resignation Date')); ?> : <span
                                        class="pull-right text-primary">{notice_date}</span></p>
                            </div>
                        <?php elseif($emailTemplate->slug == 'employee_trip'): ?>
                            <div class="row">
                                
                                <p class="col-6"><?php echo e(__('App Name')); ?> : <span
                                        class="pull-end text-primary">{app_name}</span></p>
                                <p class="col-6"><?php echo e(__('Company Name')); ?> : <span
                                        class="pull-right text-primary">{company_name}</span></p>
                                <p class="col-6"><?php echo e(__('App Url')); ?> : <span
                                        class="pull-right text-primary">{app_url}</span></p>
                                <p class="col-6"><?php echo e(__('Employee ')); ?> : <span
                                        class="pull-right text-primary">{employee_trip_name}</span></p>
                                <p class="col-6"><?php echo e(__('Purpose of Trip')); ?> : <span
                                        class="pull-right text-primary">{purpose_of_visit}</span></p>
                                <p class="col-6"><?php echo e(__('Start Date')); ?> : <span
                                        class="pull-right text-primary">{start_date}</span></p>
                                <p class="col-6"><?php echo e(__('End Date')); ?> : <span
                                        class="pull-right text-primary">{end_date}</span></p>
                                <p class="col-6"><?php echo e(__('Country')); ?> : <span
                                        class="pull-right text-primary">{place_of_visit}</span></p>
                                <p class="col-6"><?php echo e(__('Description')); ?> : <span
                                        class="pull-right text-primary">{trip_description}</span></p>
                            </div>
                        <?php elseif($emailTemplate->slug == 'employee_promotion'): ?>
                            <div class="row">
                                
                                <p class="col-6"><?php echo e(__('App Name')); ?> : <span
                                        class="pull-end text-primary">{app_name}</span></p>
                                <p class="col-6"><?php echo e(__('Company Name')); ?> : <span
                                        class="pull-right text-primary">{company_name}</span></p>
                                <p class="col-6"><?php echo e(__('App Url')); ?> : <span
                                        class="pull-right text-primary">{app_url}</span></p>
                                <p class="col-6"><?php echo e(__('Employee')); ?> : <span
                                        class="pull-right text-primary">{employee_promotion_name}</span></p>
                                <p class="col-6"><?php echo e(__('Designation')); ?> : <span
                                        class="pull-right text-primary">{promotion_designation}</span></p>
                                <p class="col-6"><?php echo e(__('Promotion Title')); ?> : <span
                                        class="pull-right text-primary">{promotion_title}</span></p>
                                <p class="col-6"><?php echo e(__('Promotion Date')); ?> : <span
                                        class="pull-right text-primary">{promotion_date}</span></p>
                            </div>
                        <?php elseif($emailTemplate->slug == 'employee_complaints'): ?>
                            <div class="row">
                                
                                <p class="col-6"><?php echo e(__('App Name')); ?> : <span
                                        class="pull-end text-primary">{app_name}</span></p>
                                <p class="col-6"><?php echo e(__('Company Name')); ?> : <span
                                        class="pull-right text-primary">{company_name}</span></p>
                                <p class="col-6"><?php echo e(__('App Url')); ?> : <span
                                        class="pull-right text-primary">{app_url}</span></p>
                                <p class="col-6"><?php echo e(__('Employee')); ?> : <span
                                        class="pull-right text-primary">{employee_complaints_name}</span></p>
                            </div>
                        <?php elseif($emailTemplate->slug == 'employee_warning'): ?>
                            <div class="row">
                                
                                <p class="col-6"><?php echo e(__('App Name')); ?> : <span
                                        class="pull-end text-primary">{app_name}</span></p>
                                <p class="col-6"><?php echo e(__('Company Name')); ?> : <span
                                        class="pull-right text-primary">{company_name}</span></p>
                                <p class="col-6"><?php echo e(__('App Url')); ?> : <span
                                        class="pull-right text-primary">{app_url}</span></p>
                                <p class="col-6"><?php echo e(__('Employee')); ?> : <span
                                        class="pull-right text-primary">{employee_warning_name}</span></p>
                                <p class="col-6"><?php echo e(__('Subject')); ?> : <span
                                        class="pull-right text-primary">{warning_subject}</span></p>
                                <p class="col-6"><?php echo e(__('Description')); ?> : <span
                                        class="pull-right text-primary">{warning_description}</span></p>
                            </div>
                        <?php elseif($emailTemplate->slug == 'employee_termination'): ?>
                            <div class="row">
                                
                                <p class="col-6"><?php echo e(__('App Name')); ?> : <span
                                        class="pull-end text-primary">{app_name}</span></p>
                                <p class="col-6"><?php echo e(__('Company Name')); ?> : <span
                                        class="pull-right text-primary">{company_name}</span></p>
                                <p class="col-6"><?php echo e(__('App Url')); ?> : <span
                                        class="pull-right text-primary">{app_url}</span></p>
                                <p class="col-6"><?php echo e(__('Employee')); ?> : <span
                                        class="pull-right text-primary">{employee_termination_name}</span></p>
                                <p class="col-6"><?php echo e(__('Notice Date')); ?> : <span
                                        class="pull-right text-primary">{notice_date}</span></p>
                                <p class="col-6"><?php echo e(__('Termination Date')); ?> : <span
                                        class="pull-right text-primary">{termination_date}</span></p>
                                <p class="col-6"><?php echo e(__('Termination Type')); ?> : <span
                                        class="pull-right text-primary">{termination_type}</span></p>
                            </div>
                        <?php elseif($emailTemplate->slug == 'leave_status'): ?>
                            <div class="row">
                                
                                <p class="col-6"><?php echo e(__('App Name')); ?> : <span
                                        class="pull-end text-primary">{app_name}</span></p>
                                <p class="col-6"><?php echo e(__('Company Name')); ?> : <span
                                        class="pull-right text-primary">{company_name}</span></p>
                                <p class="col-6"><?php echo e(__('App Url')); ?> : <span
                                        class="pull-right text-primary">{app_url}</span></p>
                                <p class="col-6"><?php echo e(__('Leave email')); ?> : <span
                                        class="pull-right text-primary">{leave_email}</span></p>
                                <p class="col-6"><?php echo e(__('Leave Status')); ?> : <span
                                        class="pull-right text-primary">{leave_status}</span></p>
                                <p class="col-6"><?php echo e(__('Employee')); ?> : <span
                                        class="pull-right text-primary">{leave_status_name}</span></p>
                                <p class="col-6"><?php echo e(__('Leave Reason')); ?> : <span
                                        class="pull-right text-primary">{leave_reason}</span></p>
                                <p class="col-6"><?php echo e(__('Leave Start Date')); ?> : <span
                                        class="pull-right text-primary">{leave_start_date}</span></p>
                                <p class="col-6"><?php echo e(__('Leave End Date')); ?> : <span
                                        class="pull-right text-primary">{leave_end_date}</span></p>
                                <p class="col-6"><?php echo e(__(' Total Days')); ?> : <span
                                        class="pull-right text-primary">{total_leave_days}</span></p>
                            </div>
                        <?php elseif($emailTemplate->slug == 'contract'): ?>
                            <div class="row">
                                
                                <p class="col-6"><?php echo e(__('Company Name')); ?> : <span
                                        class="pull-right text-primary">{company_name}</span></p>
                                <p class="col-6"><?php echo e(__('Contract Subject')); ?> : <span
                                        class="pull-right text-primary">{contract_subject}</span></p>
                                <p class="col-6"><?php echo e(__('Contract Employee')); ?> : <span
                                        class="pull-right text-primary">{contract_employee}</span></p>
                                <p class="col-6"><?php echo e(__('Contract Start Date')); ?> : <span
                                        class="pull-right text-primary">{contract_start_date}</span></p>
                                <p class="col-6"><?php echo e(__('Contract End Date')); ?> : <span
                                        class="pull-right text-primary">{contract_end_date}</span></p>
                            </div>
                        <?php elseif($emailTemplate->slug == 'new_leave_request'): ?>
                            <div class="row">
                                <p class="col-6"><?php echo e(__('Company Name')); ?> : <span
                                        class="pull-right text-primary">{company_name}</span></p>
                                <p class="col-6"><?php echo e(__('Employee Name')); ?> : <span
                                        class="pull-right text-primary">{employee_name}</span></p>
                                <p class="col-6"><?php echo e(__('Leave Type')); ?> : <span
                                        class="pull-right text-primary">{leave_type}</span></p>
                                <p class="col-6"><?php echo e(__('Leave Start and End Date')); ?> : <span
                                        class="pull-right text-primary">{leave_start_end_time}</span></p>
                                <p class="col-6"><?php echo e(__('Leave Reason')); ?> : <span
                                        class="pull-right text-primary">{leave_reason}</span></p>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12">
            <h5></h5>
            <div class="row">
                <div class="col-sm-3 col-md-3 col-lg-3 col-xl-3">
                    <div class="card sticky-top language-sidebar mb-0">
                        <div class="list-group list-group-flush" id="useradd-sidenav">
                            <?php $__currentLoopData = $languages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $lang): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <a class="list-group-item list-group-item-action border-0 <?php echo e($currEmailTempLang->lang == $key ? 'active' : ''); ?>"
                                    href="<?php echo e(route('manage.email.language', [$emailTemplate->id, $key])); ?>">
                                    <?php echo e(Str::ucfirst($lang)); ?>

                                </a>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-9 col-md-9 col-sm-9">
                    <div class="card h-100 p-3">
                        <?php echo e(Form::model($currEmailTempLang, ['route' => ['store.email.language', $currEmailTempLang->parent_id], 'method' => 'POST'])); ?>

                        <div class="form-group col-12">
                            <?php echo e(Form::label('subject', __('Subject'), ['class' => 'col-form-label text-dark'])); ?>

                            <?php echo e(Form::text('subject', null, ['class' => 'form-control font-style', 'required' => 'required'])); ?>

                        </div>
                        <div class="form-group col-12">
                            <?php echo e(Form::label('content', __('Email Message'), ['class' => 'col-form-label text-dark'])); ?>

                            <?php echo e(Form::textarea('content', $currEmailTempLang->content, ['class' => 'summernote-simple', 'id' => 'content', 'required' => 'required'])); ?>

                        </div>

                        <div class="col-md-12 text-end mb-3">
                            <?php echo e(Form::hidden('lang', null)); ?>

                            <input type="submit" value="<?php echo e(__('Save')); ?>"
                                class="btn btn-print-invoice  btn-primary m-r-10">
                        </div>
                        <?php echo e(Form::close()); ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.admin', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\hr-dashboard\resources\views/email_templates/show.blade.php ENDPATH**/ ?>