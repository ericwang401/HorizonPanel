<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Admin Language Lines
    |--------------------------------------------------------------------------
    |
    | The following language lines are used during authentication for various
    | messages that we need to display to the user. You are free to modify
    | these language lines according to your application's requirements.
    |
	*/

	'user_management' => 'User Management',
	'roles' => 'Roles',
	'all_roles' => 'All Roles',
	'name' => 'Name',
	'delete_role' => 'Delete Role',
	'edit_role' => 'Edit Role',
	'create_role' => 'Create Role',
	'submit' => 'Submit',
	'role_created' => 'Role Created Successfully',
	'role_deleted' => 'Role Deleted Successfully',
	'role_updated' => 'Role Updated Successfully',
	'editing' => 'Editing',
	'update' => 'Update',
	'cancel' => 'Cancel',
	'all_gateways' => 'All Gateways',
	'gateway' => 'Gateway',
	'all_available_gateways' => 'All Available Gateways',
	'gateway_deleted' => 'Gateway Deleted Successfully',
	'delete_gateway' => 'Delete Gateway',
	'delete_gateway_description' => 'Deleting this gateway will delete all API credentials/configuration. Users will no longer be able to perform actions using this payment gateway. Clients with recurring billing must be cancelled on their side. This action will NOT delete invoices and other billing logs.',
	'edit_gateway' => 'Edit Gateway',
	'payment_service' => 'Payment Service',
	'add_gateway' => 'Add a New Gateway',
	'add_gateway_notice' => 'When referencing a gateway, you must refer to the case-sensitive reference for the payment gateway. For example, "PayPal Express" is "PayPal_Express". To add a gateway, please visit https://github.com/thephpleague/omnipay#payment-gateways and run "composer require repository-name/payment-gateway" with composer installed + terminal access in your application root.',
	'invalid_gateway' => 'Invalid Gateway',
	'gateway_added' => 'Gateway Added Successfully',
	'gateway_integrity_error' => 'Integrity Check Failed - Please make sure the parameters are not tampered by a browser extension or by malicious tools.',
	'gateway_credentials_updated' => 'Gateway Credentials Updated Successfully',
];