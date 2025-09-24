<?php

use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\SAS\SASController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\KPI\TaskController;
use App\Http\Controllers\Admin\CRMController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\JobController;
use App\Http\Controllers\Admin\RFQController;
use App\Http\Controllers\Admin\RowController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\CmarController;
use App\Http\Controllers\Admin\DealController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\KPI\SalaryController;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\BrandController;
use App\Http\Controllers\Admin\LeaveController;
use App\Http\Controllers\Event\EventController;
use App\Http\Controllers\Salary\DataController;
use App\Http\Controllers\SAS\DealSasController;
use App\Http\Controllers\Admin\IncomeController;
use App\Http\Controllers\Admin\NoticeController;
use App\Http\Controllers\Admin\PolicyController;
use App\Http\Controllers\Admin\RegionController;
use App\Http\Controllers\Admin\TaxVatController;
use App\Http\Controllers\Order\ReportController;
use App\Http\Controllers\Order\ReturnController;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\BankingController;
use App\Http\Controllers\Admin\BulkSmsController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\CountryController;
use App\Http\Controllers\Admin\ExpenseController;
use App\Http\Controllers\Admin\FeatureController;
use App\Http\Controllers\Admin\PartnerController;
use App\Http\Controllers\Admin\PartnerPermission;
use App\Http\Controllers\Admin\ProductController;

use App\Http\Controllers\Admin\SectionController;
use App\Http\Controllers\Admin\SuccessController;
use App\Http\Controllers\Salary\EntityController;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\EmployeeController;
use App\Http\Controllers\Admin\FeedbackController;

use App\Http\Controllers\Admin\HomepageController;
use App\Http\Controllers\Admin\HrPolicyController;
use App\Http\Controllers\Admin\IndustryController;
use App\Http\Controllers\Admin\PurchaseController;
use App\Http\Controllers\Admin\SolutionController;
use App\Http\Controllers\Admin\SourcingController;
use App\Http\Controllers\Client\ProjectController;
use App\Http\Controllers\KPI\EvaluationController;
use App\Http\Controllers\Admin\BrandPageController;
use App\Http\Controllers\Admin\KnowledgeController;
use App\Http\Controllers\Admin\LearnMoreController;
use App\Http\Controllers\Admin\RFQManageController;
use App\Http\Controllers\Admin\SingleRfqController;
use App\Http\Controllers\KPI\KPICategoryController;
use App\Http\Controllers\SAS\RevisedDealController;
use App\Http\Controllers\Admin\EmploymentController;
use App\Http\Controllers\Admin\NewsLetterController;
use App\Http\Controllers\Admin\OfferPriceController;
use App\Http\Controllers\Admin\RowWithColController;
use App\Http\Controllers\Admin\TechGlossyController;
use App\Http\Controllers\Admin\WebSettingController;
use App\Http\Controllers\KPI\EmployeeTaskController;
use App\Http\Controllers\Order\AdminOrderController;
use App\Http\Controllers\Salary\AttributeController;
use App\Http\Controllers\Admin\ClientStoryController;
use App\Http\Controllers\Admin\DocumentPdfController;
use App\Http\Controllers\Admin\ExpenseTypeController;
use App\Http\Controllers\Attendance\ZktecoController;
use App\Http\Controllers\Salary\SalaryFormController;
use App\Http\Controllers\Admin\EffortRatingController;
use App\Http\Controllers\Admin\IndustryPageController;
use App\Http\Controllers\Admin\NotificationController;
use App\Http\Controllers\Admin\PresentationController;
use App\Http\Controllers\Admin\SalesForcastController;
use App\Http\Controllers\Admin\SolutionCardController;
use App\Http\Controllers\Admin\TrainingPageController;
use App\Http\Controllers\Admin\WhatWeDoPageController;
use App\Http\Controllers\Client\SupportCaseController;
use App\Http\Controllers\Sales\SalesAccountController;
use App\Http\Controllers\Admin\PortfolioPageController;
use App\Http\Controllers\Admin\PortfolioTeamController;
use App\Http\Controllers\Admin\SalesForecastController;
use App\Http\Controllers\Admin\ShowCaseVideoController;
use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Event\EventCategoryController;
use App\Http\Controllers\KPI\EmployeeProjectController;
use App\Http\Controllers\Marketing\BulkEmailController;
use App\Http\Controllers\Admin\ClientDatabaseController;
use App\Http\Controllers\Admin\HardwareCommonController;
use App\Http\Controllers\Admin\OfficeLocationController;
use App\Http\Controllers\Admin\PolicyCategoryController;
use App\Http\Controllers\Admin\RfqOrderStatusController;
use App\Http\Controllers\Admin\SoftwareCommonController;
use App\Http\Controllers\Admin\TechnologyDataController;
use App\Http\Controllers\Attendance\BioMetricController;
use App\Http\Controllers\Client\ClientSupportController;
use App\Http\Controllers\Solution\SolutionCMSController;
use App\Http\Controllers\Admin\DealTypeSettingController;
use App\Http\Controllers\Admin\ExpenseCategoryController;
use App\Http\Controllers\Admin\PortfolioClientController;
use App\Http\Controllers\Admin\PortfolioDetailController;
use App\Http\Controllers\Admin\SalesProfitLossController;
use App\Http\Controllers\Admin\SalesTeamTargetController;
use App\Http\Controllers\Admin\SalesYearTargetController;
use App\Http\Controllers\Admin\SolutionDetailsController;
use App\Http\Controllers\Admin\TierCalculationController;
use App\Http\Controllers\Admin\AdminMenuBuilderController;
use App\Http\Controllers\Admin\EmployeeCategoryController;
use App\Http\Controllers\Admin\HardwareInfoPageController;
use App\Http\Controllers\Admin\LeaveApplicationController;
use App\Http\Controllers\Admin\SoftwareInfoPageController;
use App\Http\Controllers\Sales\SalesAchievementController;
use App\Http\Controllers\Admin\PortfolioCategoryController;
use App\Http\Controllers\Admin\PortfolioChooseUsController;
use App\Http\Controllers\FormBulider\FormBuilderController;
use App\Http\Controllers\Marketing\MarketingDmarController;
use App\Http\Controllers\Admin\CommercialDocumentController;
use App\Http\Controllers\Admin\EmployeeDepartmentController;
use App\Http\Controllers\Admin\FrontendNavbarMenuController;
use App\Http\Controllers\Admin\FrontendMenuBuilderController;
use App\Http\Controllers\Admin\FrontendNavbarModuleController;
use App\Http\Controllers\Admin\PaymentMethodDetailsController;
use App\Http\Controllers\Admin\PolicyAcknowledgmentsController;
use App\Http\Controllers\Client\ClientSupportMessageController;
use App\Http\Controllers\Admin\FrontendNavbarMenuItemController;
use App\Http\Controllers\Admin\PortfolioClientFeedbackController;
use App\Http\Controllers\Attendance\AttendanceController;
use App\Http\Controllers\Marketing\MarketingTeamTargetController;
use App\Http\Controllers\Marketing\MarketingManagerRoleController;

// Route::get('/admin/login', [AdminController::class, 'AdminLogin'])->name('admin.login')->middleware(RedirectIfAuthenticated::class);
Route::middleware('auth')->prefix('admin')->name('admin.')->group(function () {
    Route::resources(
        [
            'rfq'          => RFQController::class,
            'solution-cms' => SolutionCMSController::class,
            'brand'        => BrandController::class,
            'category'     => CategoryController::class,
            'blog'         => BlogController::class,
            'job-post'     => JobController::class,
        ]
    );
    Route::resources(
        [
            'contact' => ContactController::class,
        ],
        ['except' => ['show', 'create']]
    );

    Route::get('sales-forecast', [SalesForecastController::class, 'salesForecast'])->name('sales.forecast');
    Route::get('sales-report', [SalesForecastController::class, 'salesReport'])->name('sales.report');

    Route::get('archived/rfq', [RfqController::class, 'archivedRFQ'])->name('archived.rfq');
    Route::post('template/store', [SolutionCMSController::class, 'templateStore'])->name('solution.template.add');
    Route::get('/rfqFilter', [RfqController::class, 'filterRFQ'])->name('rfq.filter');
    Route::get('web-setting', [WebSettingController::class, 'index'])->name('setting.index');
    Route::put('seo/setting', [WebSettingController::class, 'seo'])->name('seo.setting');
    Route::put('smtp/setting', [WebSettingController::class, 'smtp'])->name('smtp.setting');
    Route::put('site/setting', [WebSettingController::class, 'site'])->name('site.setting');
    Route::put('run/tools', [WebSettingController::class, 'runTools'])->name('tools.run');
    Route::get('hr/dashboard', [DashboardController::class, 'hrDashboard'])->name('hrDashboard.index');
    Route::get('hr-and-admin', [DashboardController::class, 'hrDashboard'])->name('hr-and-admin.index');
    // Toggle Status
    Route::post('brands/toggle-status/{id}', [BrandController::class, 'toggleStatus'])->name('brands.toggle-status');
    // Route::controller(RFQController::class)->group(function () {
    //     Route::get('/rfq', 'index')->name('admin.rfq.index'); // Corrected route name
    // });

    Route::controller(DashboardController::class)->group(function () {
        Route::get('site-dashboard', 'siteDashboard')->name('site-content.index');
        Route::get('site-setting', 'siteSetting')->name('site-setting.index');
        Route::get('accounts-finance', 'accountsFinance')->name('accounts-finance.index');
        Route::get('business', 'business')->name('business.index');
        Route::get('sales-dashboard', 'salesDashboard')->name('sales-dashboard.index');
        Route::get('marketing-dashboard', 'marketingDashboard')->name('marketing-dashboard.index');
    });
});


// Route::get('web-setting', [WebSettingController::class, 'index'])->name('setting.index');



Route::group(['prefix' => 'admin', 'middleware' => ['auth']], function () {

    $userDepartment = auth()->check() ? json_decode(auth()->user()->department, true) : [];


    Route::post('/mark-as-read', [AdminController::class, 'markNotification'])->name('markNotification');
    Route::post('/markread', [AdminController::class, 'markAsRead'])->name('markAsRead');
    // Admin Profile All Route
    Route::get('/dashboard',        [AdminController::class, 'AdminDashboard'])->name('admin.dashboard');
    Route::get('attendance',        [ZktecoController::class, 'index'])->name('attendance');
    Route::get('/logout',           [AdminController::class, 'AdminDestroy'])->name('admin.logout');
    Route::get('/profile',          [AdminController::class, 'AdminProfile'])->name('admin.profile');
    // Route::post('/profile/store',   [AdminController::class, 'AdminProfileStore'])->name('admin.profile.store');
    Route::get('/change/password',  [AdminController::class, 'AdminChangePassword'])->name('admin.change.password');
    Route::post('/update/password', [AdminController::class, 'AdminUpdatePassword'])->name('update.password');

    //All Admin
    Route::get('/all/admin',        [AdminController::class, 'AllAdmin'])->name('all.admin');
    Route::get('/add/admin',        [AdminController::class, 'AddAdmin'])->name('add.admin');
    Route::get('/edit/admin/{id}',  [AdminController::class, 'EditAdminUser'])->name('edit.admin');
    Route::put('/edit/admin/{id}',  [AdminController::class, 'AdminUserUpdate'])->name('update.admin');
    Route::post('/admin/user/store', [AdminController::class, 'AdminUserStore'])->name('admin.user.store');
    Route::post('admin-status',     [AdminController::class, 'AdminStatus'])->name('admin.status');
    Route::post('employee-store',     [AdminController::class, 'employeeStore'])->name('add.employee');
    Route::put('/edit/employee/{id}',  [AdminController::class, 'editEmployee'])->name('edit.employee');



    // Category All Route
    Route::controller(CategoryController::class)->group(function () {
        Route::post('/store/sub_category', 'StoreSubCategory')->name('store.subcategory');
        Route::post('/store/sub_sub_category', 'StoreSubSubCategory')->name('store.subsubcategory');
        Route::post('/store/sub_sub_sub_category', 'StoreSubSubSubCategory')->name('store.subsubsubcategory');
        Route::put('subcategory/{id}', 'UpdateSubCategory')->name('update.subcategory');
        Route::put('subsubcategory/{id}', 'UpdateSubSubCategory')->name('update.subsubcategory');
        Route::put('subsubsubcategory/{id}', 'UpdateSubSubSubCategory')->name('update.subsubsubcategory');
        Route::delete('sub_category/{id}', 'SubCatdestroy')->name('subcategory.destroy');
        Route::delete('sub_sub_category/{id}', 'SubSubCatdestroy')->name('subsubcategory.destroy');
        Route::delete('sub_sub_sub_category/{id}', 'SubSubSubCatdestroy')->name('subsubsubcategory.destroy');
    });



    // All RFQ Routes
    Route::controller(RFQManageController::class)->group(function () {
        Route::get('/rfq/list', 'index')->name('rfq.list');
        Route::get('/deal/list', 'dealList')->name('deal.list');
        Route::get('/single-rfq/{id}', 'show')->name('single-rfq.show');
        Route::get('/single-rfq/{id}/quotation', 'quotationMail')->name('single-rfq.quoation_mail');
    });

    Route::put('assign_salesmanager/{id}', [RFQController::class, 'AssignSalesMan'])->name('assign.salesman');
    Route::put('assign-salesman/{id}', [RFQController::class, 'AssignSalesManager'])->name('assign.salesmanager');

    Route::controller(RFQController::class)->group(function () {
        Route::get('/edit/{id}/rfq-to-deal', 'DealConvert')->name('deal.convert');
        Route::put('convert-deal/store/{id}', 'ConvertDealStore')->name('convert.deal');
        Route::get('/client/ajax/{client_id}', 'GetClient');
    });

    Route::controller(DealController::class)->group(function () {
        Route::get('/partner/ajax/{partner_id}', 'GetPartner');
        Route::get('/client/ajax/{client_id}', 'GetClient');
        Route::put('/send/quotation/{id}',  'SendQuotation')->name('quotation.send');
        Route::put('/send/invoice/{id}',  'dealInvoiceSent')->name('invoice.send');
        // Route::put('/upload/payment-proof/{id}',  'proofPaymentUpload')->name('payment-proof.upload');
        Route::put('/check/quotation/{id}', 'CheckQuotation')->name('quotation.check');
    });

    //Deal SAS
    Route::get('/deal_sas_show/{id}', [DealSasController::class, 'DealSasShow'])->name('dealsasshow');
    Route::get('/deal_sas_approve/{id}', [DealSasController::class, 'DealSasApprove'])->name('dealsasapprove');
    Route::put('/deal_sas/product_unitprice/update/{id}/', [DealSasController::class, 'UnitPriceUpdate'])->name('update.unitprice');
    Route::put('/deal-sas/approve/{id}/store/', [DealSasController::class, 'DealSasApproveStore'])->name('approve.deal-sas');


    // Route::get('/attendance-data/single/{id}', [AttendanceController::class, 'attendanceDataSingle'])->name('attendance.single');
    Route::get('/attendance-data/single/{id}/current-month', [AttendanceController::class, 'attendanceDataCurrentMonth'])->name('attendance.single.currentMonth');
    Route::get('/attendance-data/single/{id}/last-month', [AttendanceController::class, 'attendanceDataLastMonth'])->name('attendance.single.lastMonth');

    Route::resources(
        [
            // 'rfq'             => RFQController::class,
            'rfq-manage'      => RFQManageController::class,
            'deal'            => DealController::class,
            'rfqOrderStatus'  => RfqOrderStatusController::class,
        ]
    );


    Route::post('account/create', [RFQManageController::class, 'accountCreate'])->name('account.create');

    // Product All Route
    Route::controller(ProductController::class)->group(function () {
        Route::get('/all/product', 'AllProduct')->name('all.product');
        Route::get('/add/product', 'AddProduct')->name('add.product');
        Route::post('/store/product', 'StoreProduct')->name('store.product');
        Route::get('/edit/product/{id}', 'EditProduct')->name('edit.product');
        Route::post('/update/product', 'UpdateProduct')->name('update.product');
        Route::post('/update/product/thambnail', 'UpdateProductThambnail')->name('update.product.thambnail');
        Route::post('/update/product/multiimage', 'UpdateProductMultiimage')->name('update.product.multiimage');
        Route::delete('/product/multiimg/delete/{id}', 'MulitImageDelelte')->name('product.multiimg.delete');

        Route::get('/product/inactive/{id}', 'ProductInactive')->name('product.inactive');
        Route::get('/product/active/{id}', 'ProductActive')->name('product.active');
        //Route::get('/delete/product/{id}' , 'ProductDelete')->name('delete.product');
        Route::delete('/delete/product/{id}', 'ProductDelete')->name('product.destroy');

        // For Product Stock ,.,
        Route::get('/product/stock', 'ProductStock')->name('product.stock');
        Route::get('product/price_notification', 'toastrIndex')->name('product.price_notification');
    });

    Route::controller(SourcingController::class)->group(function () {
        Route::get('/products/sourced', 'index')->name('product.sourced');
        Route::get('/products/saved', 'savedProducts')->name('product.saved');
        Route::get('/products/approved', 'approvedProducts')->name('product.approved');
    });

    Route::get('/rfq_approve/{id}', [RFQController::class, 'rfqApprove'])->name('rfq.approve');
    Route::get('/rfq_reject/{id}', [RFQController::class, 'rfqReject'])->name('rfq.reject');






    Route::post('client_status', [ClientDatabaseController::class, 'clientStatus'])->name('client.status');

    Route::post('partner_status', [App\Http\Controllers\Admin\PartnerPermission::class, 'partnerStatus'])->name('partner.status');






    // Permission All Route
    Route::controller(RoleController::class)->group(function () {

        Route::get('/all/permission', 'AllPermission')->name('all.permission');
        Route::get('/add/permission', 'AddPermission')->name('add.permission');
        Route::post('/store/permission', 'StorePermission')->name('store.permission');
        Route::get('/edit/permission/{id}', 'EditPermission')->name('edit.permission');
        Route::post('/update/permission', 'UpdatePermission')->name('update.permission');
        Route::delete('/delete/permission/{id}', 'DeletePermission')->name('delete.permission');
    });


    // Roles All Route
    Route::controller(RoleController::class)->group(function () {

        Route::get('/all/roles', 'AllRoles')->name('all.roles');
        Route::get('/add/roles', 'AddRoles')->name('add.roles');
        Route::post('/store/roles', 'StoreRoles')->name('store.roles');
        Route::get('/edit/roles/{id}', 'EditRoles')->name('edit.roles');
        Route::post('/update/roles', 'UpdateRoles')->name('update.roles');
        Route::delete('/delete/roles/{id}', 'DeleteRoles')->name('delete.roles');

        // add role permission
        Route::get('/add/roles/permission', 'AddRolesPermission')->name('add.roles.permission');
        Route::post('/role/permission/store', 'RolePermissionStore')->name('role.permission.store');
        Route::get('/all/roles/permission', 'AllRolesPermission')->name('all.roles.permission');
        Route::get('/admin/edit/roles/{id}', 'AdminRolesEdit')->name('admin.edit.roles');
        Route::post('/admin/roles/update/{id}', 'AdminRolesUpdate')->name('admin.roles.update');
        Route::delete('/admin/delete/roles/{id}', 'AdminRolesDelete')->name('admin.delete.roles');
    });





    // Admin Order All Route
    Route::controller(AdminOrderController::class)->group(function () {
        Route::get('/pending/order', 'PendingOrder')->name('pending.order');
        Route::get('/admin/order/details/{order_id}', 'AdminOrderDetails')->name('admin.order.details');

        Route::get('/admin/confirmed/order', 'AdminConfirmedOrder')->name('admin.confirmed.order');

        Route::get('/admin/processing/order', 'AdminProcessingOrder')->name('admin.processing.order');

        Route::get('/admin/delivered/order', 'AdminDeliveredOrder')->name('admin.delivered.order');

        Route::get('/pending/confirm/{order_id}', 'PendingToConfirm')->name('pending-confirm');
        Route::get('/confirm/processing/{order_id}', 'ConfirmToProcess')->name('confirm-processing');

        Route::get('/processing/delivered/{order_id}', 'ProcessToDelivered')->name('processing-delivered');

        Route::get('/admin/invoice/download/{order_id}', 'AdminInvoiceDownload')->name('admin.invoice.download');
    });


    // Return Order All Route
    Route::controller(ReturnController::class)->group(function () {
        Route::get('/return/request', 'ReturnRequest')->name('return.request');

        Route::get('/return/request/approved/{order_id}', 'ReturnRequestApproved')->name('return.request.approved');

        Route::get('/complete/return/request', 'CompleteReturnRequest')->name('complete.return.request');
    });


    // Report All Route
    Route::controller(ReportController::class)->group(function () {

        Route::get('/report/view', 'ReportView')->name('report.view');
        Route::post('/search/by/date', 'SearchByDate')->name('search-by-date');
        Route::post('/search/by/month', 'SearchByMonth')->name('search-by-month');
        Route::post('/search/by/year', 'SearchByYear')->name('search-by-year');

        Route::get('/order/by/user', 'OrderByUser')->name('order.by.user');
        Route::post('/search/by/user', 'SearchByUser')->name('search-by-user');
    });

    //jobRegister
    Route::get('job-register-user', [App\Http\Controllers\Frontend\JobController::class, 'jobRegisterUser'])
        ->name('job.regiserUser');
    Route::get('job-register-user/show/{id}', [App\Http\Controllers\Frontend\JobController::class, 'jobRegisterUserShow'])
        ->name('job.regiserUser.show');
    Route::delete('job-register-user/{id}', [App\Http\Controllers\Frontend\JobController::class, 'jobRegisterUserDestroy'])
        ->name('job.regiserUser.destroy');
    Route::get('job-register-user/download/{id}', [App\Http\Controllers\Frontend\JobController::class, 'jobRegisterUserDownload'])
        ->name('resume.download');








    Route::controller(SourcingController::class)->group(function () {
        Route::get('approve-product',  'ProductApprove')->name('product.approve');
        Route::put('product-approve/store/{id}', 'StoreProductApproval')->name('product-approve.store');
    });

    //Product Sourcing




    Route::get('/sas/{id}/sourcing', [App\Http\Controllers\SAS\SASController::class, 'SourcingSas'])->name('sourcing.sas');
    Route::post('/sas/rejection/sourcing', [App\Http\Controllers\SAS\SASController::class, 'SasRejection'])->name('sas.reject');




    Route::delete('/delete-quotationProduct/{id}',  [RFQManageController::class, 'quotationProductDelete'])->name('delete.quotationProduct');
    Route::delete('/delete-quotationTerms/{id}',  [RFQManageController::class, 'quotationTermsDelete'])->name('delete.quotationTerms');
    Route::post('bypass_quotation/send', [RFQManageController::class, 'bypassQuotationSend'])->name('bypass_quotation.send');



    Route::get('send/mail', [PartnerController::class, 'sendBulkMail'])->name('sendBulkMail');
    Route::get('bulksms', [BulkSmsController::class, 'bulksms']);
    Route::post('bulksms', [BulkSmsController::class, 'sendSms'])->name('sendSms');



    //Overview
    Route::get('/income-expense/overview', [IncomeController::class, 'Overview'])->name('income-expense.overview');

    //Ledger
    Route::get('/income-expense/ledger', [ExpenseController::class, 'Ledger'])->name('income-expense.ledger');
    //All Dashboard
    // Route::controller(DashboardController::class)->group(function () {
    //     Route::get('site-content', 'siteContent')->name('admin.site-content.index');
    //     Route::get('site-setting', 'siteSetting')->name('admin.site-setting.index');
    //     Route::get('hr-and-admin', 'hrAdmin')->name('admin.hr-and-admin.index');
    //     Route::get('accounts-finance', 'accountsFinance')->name('accounts-finance.index');
    //     Route::get('business', 'business')->name('admin.business.index');
    //     Route::get('sales-dashboard', 'salesDashboard')->name('admin.sales-dashboard.index');
    //     Route::get('marketing-dashboard', 'marketingDashboard')->name('admin.marketing-dashboard.index');
    // });


    Route::resources(
        [
            'income'                     => IncomeController::class,
            'product-section'            => SectionController::class,
            'expense'                    => ExpenseController::class,
            'bulkEmail'                  => BulkEmailController::class,
            'office-location'            => OfficeLocationController::class,
            'sales-forcast'              => SalesForcastController::class,
            'purchase'                   => PurchaseController::class,
            'sales-profit-loss'          => SalesProfitLossController::class,
            'salesTeamTarget'            => SalesTeamTargetController::class,
            'salesYearTarget'            => SalesYearTargetController::class,
            'feedback'                   => FeedbackController::class,
            'partner-account'            => PartnerController::class,
            'commercial-document'        => CommercialDocumentController::class,
            'payment-method-details'     => PaymentMethodDetailsController::class,
            'sales-achievement'          => SalesAchievementController::class,
            'deal-type-settings'         => DealTypeSettingController::class,
            'effort-ratings'             => EffortRatingController::class,
            'marketing-manager-role'     => MarketingManagerRoleController::class,
            'marketing-team-target'      => MarketingTeamTargetController::class,
            'marketing-dmar'             => MarketingDmarController::class,
            'notification'               => NotificationController::class,
            'technology-data'            => TechnologyDataController::class,
            'knowledge'                  => KnowledgeController::class,
            'presentation'               => PresentationController::class,
            'show-case-video'            => ShowCaseVideoController::class,
            'client-database'            => ClientDatabaseController::class,
            // 'category'                   => CategoryController::class,
            // 'brand'                      => BrandController::class,
            'success'                    => SuccessController::class,
            // 'setting'                 => SettingController::class,
            // 'solution'                   => SolutionController::class,

            'newsLetter'                 => NewsLetterController::class,
            'partnerPermission'          => PartnerPermission::class,
            'homepage'                   => HomepageController::class,
            'blog'                       => BlogController::class,
            'row'                        => RowController::class,
            'rowWithCol'                 => RowWithColController::class,
            'clientstory'                => ClientStoryController::class,
            'techglossy'                 => TechGlossyController::class,
            'learnMore'                  => LearnMoreController::class,
            'industry'                   => IndustryController::class,
            'industryPage'               => IndustryPageController::class,
            'solutionCard'               => SolutionCardController::class,
            'solutionDetails'            => SolutionDetailsController::class,
            'policy'                     => PolicyController::class,
            'feature'                    => FeatureController::class,
            'brandPage'                  => BrandPageController::class,
            'country'                    => CountryController::class,
            'region'                     => RegionController::class,
            'sas'                        => SASController::class,
            'product-sourcing'           => SourcingController::class,
            'deal-sas'                   => DealSasController::class,
            'revised-deal'               => RevisedDealController::class,
            'partner-account'            => PartnerController::class,
            'sales-account'              => SalesAccountController::class,
            'expense-category'           => ExpenseCategoryController::class,
            'expense-type'               => ExpenseTypeController::class,
            'tax-vat'                    => TaxVatController::class,
            'delivery'                   => DeliveryController::class,
            'offer-price'                => OfferPriceController::class,

            // phase 2 part 2
            'what-we-do-page'           => WhatWeDoPageController::class, // done
            'software-info-page'        => SoftwareInfoPageController::class, // done
            'hardware-info-page'        => HardwareInfoPageController::class, // done
            'software-common-page'      => SoftwareCommonController::class, // done
            'hardware-common-page'      => HardwareCommonController::class, // done

            'training-page'             => TrainingPageController::class, // done
            'tax-vat'                   => TaxVatController::class, // done
            'expense-category'          => ExpenseCategoryController::class, // done
            'about-us'                  => AboutUsController::class, //pending
            'expense-type'              => ExpenseTypeController::class, //done
            'tier-calculation'          => TierCalculationController::class, //done
            'portfolio-client'          => PortfolioClientController::class, //done
            'portfolio-team'            => PortfolioTeamController::class, //done
            'portfolio-choose-us'       => PortfolioChooseUsController::class, //done

            'portfolio-category'        => PortfolioCategoryController::class,
            'portfolio-page'            => PortfolioPageController::class,
            'portfolio-detail'          => PortfolioDetailController::class, //pending dd
            'portfolio-client-feedback' => PortfolioClientFeedbackController::class,
            'frontend-navbar-module'    => FrontendNavbarModuleController::class,
            'frontend-navbar-menu'      => FrontendNavbarMenuController::class,
            'frontend-navbar-menu-items' => FrontendNavbarMenuItemController::class,

            'cmar'                      => CmarController::class,
            'employee'                  => EmployeeController::class,
            'faq'                       => FaqController::class,
            'document'                  => DocumentPdfController::class,

            'employee-category'         => EmployeeCategoryController::class, // fully done
            'employee-department'       => EmployeeDepartmentController::class, //  fully done
            'notice'                    => NoticeController::class, // persially done => notice show like sticy note
            'policy-category'           => PolicyCategoryController::class, //  fully done
            'hr-policy'                 => HrPolicyController::class, //  fully done
            'policy-acknowledgment'     => PolicyAcknowledgmentsController::class, // done
            'employeement'              => EmploymentController::class, // done
            'leave-application'         => LeaveApplicationController::class, // done
            'formBuilder'               => FormBuilderController::class, // done
            'event'                     => EventController::class, // done
            'kpi-category'              => KPICategoryController::class, //  fully done
            'event-category'            => EventCategoryController::class, //  fully done
            'entity'                    => EntityController::class, // back and front done
            'data'                      => DataController::class, // back and front done
            'attribute'                 => AttributeController::class, // back done
            'salary-form'               => SalaryFormController::class, // back done
            'client-support'            => ClientSupportController::class, // back done
            'support-case'              => SupportCaseController::class, // back done
            'project'                   => ProjectController::class,
            'evaluation'                => EvaluationController::class,
            'salary'                    => SalaryController::class,
            'employee-task'             => EmployeeTaskController::class,
            'task'                      => TaskController::class,
            'employee-project'          => EmployeeProjectController::class,
        ],
        [
            // 'frontend-navbar-menu'->except(['show','create','edit']),
            //   'except' => ['show','tax-vat','create','edit']
            //    'except' => ['frontend-navbar-menu','show','create','edit'],
            //    'except' => ['frontend-navbar-menu-items','show','create','edit','index'],
            // you can set here other options e.g. 'only', 'except', 'names', 'middleware'
        ]
    );
    if (in_array('admin', $userDepartment)) {
        Route::resource('employee', EmployeeController::class)->names([
            'index'   => 'employee.index',
            'create'  => 'employee.create',
            'store'   => 'employee.store',
            'show'    => 'employee.show',
            'edit'    => 'employee.edit',
            'update'  => 'employee.update',
            'destroy' => 'employee.destroy',
        ]);
    }


    Route::post('admin/case/message',  [ClientSupportMessageController::class, 'store'])->name('admin.message.store');
    Route::get('/project-dashboard',  [ProjectController::class, 'projectDashboard'])->name('project.dashboard');
    Route::get('/events/dashboard',  [EventController::class, 'eventDashboard'])->name('event.dashboard');

    //Leave Routes
    Route::get('/filter-events/{id}',  [EventController::class, 'filterEvents'])->name('filter.events');

    Route::get('leaveApplications',  [LeaveApplicationController::class, 'leaveApplications'])->name('leaveApplications');
    Route::get('leaveHistorys',  [LeaveApplicationController::class, 'leaveHistorys'])->name('leave.history');
    Route::get('{id}/leaveHistorys',  [LeaveApplicationController::class, 'individualLeaves'])->name('individual.leaveHistory');
    Route::get('leaveDashboard',  [LeaveController::class, 'leaveDashboard'])->name('leaveDashboard');

    Route::put('/substitute-approval/{id}',  [LeaveController::class, 'substituteApproval'])->name('substitute.approval');
    Route::put('/supervisor-approval/{id}',  [LeaveController::class, 'supervisorApproval'])->name('supervisor.approval');
    Route::put('/hr-approval/{id}',  [LeaveController::class, 'hrApproval'])->name('hr.approval');
    Route::put('/ceo-approval/{id}',  [LeaveController::class, 'ceoApproval'])->name('ceo.approval');

    Route::get('supply-chain',  [AdminController::class, 'supplyChain'])->name('supplychain');
    Route::get('noticeboard',  [NoticeController::class, 'noticeboard'])->name('noticeboard');

    // Route::get('attendance',  [ControllersZktecoController::class, 'leaveHistorys'])->name('attendance');

    //Assign Roles to Sales Manager
    Route::put('assign_roles/SalesManager/{id}', [SalesAccountController::class, 'assignSalesManagerRole'])->name('assign.salesmanager-role');


    Route::post('notifiy/bulk-delete', [NotificationController::class, 'multiDelete'])->name('notifiy.multi-delete');
    Route::controller(EffortRatingController::class)->group(function () {
        Route::get('/effort/ajax/{id}', 'GetEffortRating')->name('get.effort.ajax');
    });



    Route::get('/sales-achievement/summary', [SalesAchievementController::class, 'salesAchievementSummary'])->name('dashboard.salesachievement');
    Route::get('/sales-report/dashboard', [SalesYearTargetController::class, 'salesReportDashboard'])->name('dashboard.salesreport');


    Route::post('salesmanager-status', [App\Http\Controllers\Sales\SalesAccountController::class, 'SalesStatus'])->name('sales.status');




    ///Biomrtric Attendance

    Route::get('/hr-admin', [BioMetricController::class, 'index'])->name('attendance.dashboard');
    // Route::get('/hr-admin', [BioMetricController::class, 'index'])->name('machine.home');
    Route::post('/device-setip', [BioMetricController::class, 'device_setip'])->name('machine.devicesetip');
    // Route::post('/device-setip', [BioMetricController::class, 'device_setip'])->name('attendance.dashboard');
    Route::get('/device-information', [BioMetricController::class, 'device_information'])->name('machine.deviceinformation');
    Route::get('/device-user-data', [BioMetricController::class, 'device_user_data'])->name('machine.deviceuserdata');
    Route::get('/device-attendance-data', [BioMetricController::class, 'device_attendance_data'])->name('machine.deviceattendancedata');
    Route::get('/device-adduser', [BioMetricController::class, 'device_adduser'])->name('machine.deviceadduser');
    Route::post('/device-setuser', [BioMetricController::class, 'device_setuser'])->name('machine.devicesetuser');
    Route::get('/device-removeuser-single/{id}', [BioMetricController::class, 'device_removeuser_single'])->name('machine.deviceremoveusersingle');
    Route::get('/device-viewuser-single/[id]', [BioMetricController::class, 'device_viewuser_single'])->name('machine.deviceviewusersingle');
    Route::get('/device-data/clear-attendance', [BioMetricController::class, 'device_data_clear_attendance'])->name('machine.devicedata.clear.attendance');
    Route::get('/device-restart', [BioMetricController::class, 'device_restart'])->name('machine.devicerestart');
    Route::get('/device-shutdown', [BioMetricController::class, 'device_shutdown'])->name('machine.deviceshutdown');


    ///

});
