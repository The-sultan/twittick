<?php session_start(); ?>

<div class="clearfix">
	<div class="alert alert-success" style="display: none;">
		<button type="button" class="close" data-dismiss="alert">&times;</button>
		<span class="tw-alert-message"> </span>
		<!--<strong>Cool!</strong> The ticket was successfully removed. <a href="#"><i class="icon-undo"></i> Undo</a>.-->
	</div>
	<h1 class="pull-left">Box View</h1>

	<div class="btn-group pull-right" data-toggle="buttons-radio">
		<a href="#dashbox" ng-click="setListView(1)" type="button" class="btn tw-btn-view"><i class="icon-th-list"></i></a>
		<a href="#dashlist" ng-click="setListView(0)" type="button" class="btn tw-btn-view active"><i class="icon-th-large"></i></a>		
	</div>
</div>
<div>
	<div  ng-repeat="ticketRow in tickets" class="ticket-box-container row-fluid ">
		<div class="span3 well " ng-repeat="ticket in ticketRow">
			<div><b>{{ticket.title}}</b></div>
			<div>{{ticket.type}}</div>
			<div>{{ticket.status}}</div>
			<div>{{ticket.priority}}</div>
			<div>
				<?php if ($_SESSION['user']['role'] == 'requestor') : ?>

					<div ng-switch on="ticket.status">
						<div ng-switch-when="NEW">
							<a href="#/ticket/{{ticket.id}}" bs-tooltip="'View'" class="btn btn-info tw-action-btn"><i  class="icon-eye-open"></i></a>&nbsp;&nbsp;&nbsp;
							<a href="#/ticket/{{ticket.id}}/edit" bs-tooltip="'Edit'" class="btn btn-info tw-action-btn"><i class="icon-edit"></i> </a>&nbsp;&nbsp;&nbsp;
							<a href="#" ng-click="cancelTicket(ticket.id)" bs-tooltip="'Cancel'" class="btn btn-info tw-action-btn"><i class="icon-remove"></i> </a>&nbsp;&nbsp;&nbsp;
							<a href="#" ng-click="deleteTicket(ticket.id)" bs-tooltip="'Delete'" class="btn btn-info tw-action-btn"><i class="icon-trash"></i> </a>
						</div>
						<div ng-switch-when="APPROVED">
							<a href="#/ticket/{{ticket.id}}" bs-tooltip="'View'" class="btn btn-info tw-action-btn"><i class="icon-eye-open"></i> </a>&nbsp;&nbsp;&nbsp;
							<a href="#" bs-modal="'partials/modal/cancel.php'" bs-tooltip="'Cancel'" class="btn btn-info tw-action-btn"><i class="icon-remove"></i> </a>&nbsp;&nbsp;&nbsp;
							<a href="#" ng-click="deleteTicket(ticket.id)" bs-tooltip="'Delete'" class="btn btn-info tw-action-btn"><i class="icon-trash"></i> </a>
						</div>
						<div ng-switch-default>
							<a href="#/ticket/{{ticket.id}}" bs-tooltip="'View'" class="btn btn-info tw-action-btn"><i class="icon-eye-open" bs-tooltip="'View'" class="btn btn-info tw-action-btn"></i> </a>&nbsp;&nbsp;&nbsp;
							<a href="#" ng-click="deleteTicket(ticket.id)" bs-tooltip="'Delete'" class="btn btn-info tw-action-btn"><i class="icon-trash"></i> </a>
						</div>
					</div>

				<?php elseif ($_SESSION['user']['role'] == 'approver') : ?>
					<div ng-switch on="ticket.status">
						<div ng-switch-when="NEW">
							<a href="#/ticket/{{ticket.id}}" bs-tooltip="'View'" class="btn btn-info tw-action-btn"><i class="icon-eye-open"></i> </a>&nbsp;&nbsp;&nbsp;
							<a href="#/ticket/{{ticket.id}}/edit" bs-tooltip="'Edit'" class="btn btn-info tw-action-btn"><i class="icon-edit"></i> </a>&nbsp;&nbsp;&nbsp;
							<a href="#" ng-click="approveTicket(ticket.id)" bs-tooltip="'Approve'" class="btn btn-info tw-action-btn"><i class="icon-thumbs-up"></i> </a>&nbsp;&nbsp;&nbsp;
							<a href="#" ng-click="rejectTicket(ticket.id)" bs-tooltip="'Reject'" class="btn btn-info tw-action-btn"><i class="icon-thumbs-down"></i> </a>&nbsp;&nbsp;&nbsp;
							<a href="#" ng-click="cancelTicket(ticket.id)" bs-tooltip="'Cancel'" class="btn btn-info tw-action-btn"><i class="icon-remove"></i> </a>&nbsp;&nbsp;&nbsp;
						</div>
						<div ng-switch-when="APPROVED">
							<a href="#/ticket/{{ticket.id}}" bs-tooltip="'View'" class="btn btn-info tw-action-btn"><i class="icon-eye-open"></i> </a>&nbsp;&nbsp;&nbsp;
							<a href="#/ticket/{{ticket.id}}/edit" bs-tooltip="'Edit'" class="btn btn-info tw-action-btn"><i class="icon-edit"></i> </a>&nbsp;&nbsp;&nbsp;
						</div>
						<div ng-switch-default>
							<a href="#/ticket/{{ticket.id}}" bs-tooltip="'View'" class="btn btn-info tw-action-btn"><i class="icon-eye-open"></i> </a>
						</div>
					</div>
				<?php elseif ($_SESSION['user']['role'] == 'executor') : ?>
					<div ng-switch on="ticket.status">
						<div ng-switch-when="APPROVED">
							<a href="#/ticket/{{ticket.id}}" bs-tooltip="'View'" class="btn btn-info tw-action-btn"><i class="icon-eye-open"></i> </a>&nbsp;&nbsp;&nbsp;
							<a href="#" ng-click="doneTicket(ticket.id)" bs-tooltip="'Mark as Done'" class="btn btn-info tw-action-btn"><i class="icon-check"></i></a>
						</div>
						<div ng-switch-default>
							<a href="#/ticket/{{ticket.id}}" bs-tooltip="'View'" class="btn btn-info tw-action-btn"><i class="icon-eye-open"></i></a>
						</div>
					</div>
				<?php endif; ?>
			</div>
		</div>
	</div>
</div>

<style>
    tr.tw-critical > td {
        background-color: #f2dede;
    }
    tr.tw-high > td {
        background-color: #fcf8e3;
    }
    tr.tw-medium > td {
        background-color: #d9edf7;
    }
    tr.tw-low > td {
        background-color: #dff0d8;
    }
</style>