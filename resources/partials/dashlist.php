<?php session_start(); ?>

<div class="alert fade" bs-alert="alert"></div>

<h1 class="pull-left">List View</h1>

<div class="btn-group pull-right" data-toggle="buttons-radio">
    <a href="#dashlist" ng-click="setListView(1)" type="button" class="btn tw-btn-view active"><i class="icon-th-list"></i></a>
    <a href="#dashbox" ng-click="setListView(0)" type="button" class="btn tw-btn-view"><i class="icon-th-large"></i></a>
</div>

<div class="tw-table-container">
    <table class="tw-ticket-table table">
        <thead>
            <tr>
                <th>&nbsp;</th>
                <th>Title</th>
                <th>Type</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="ticket in tickets | filter:query | orderBy:orderProp">
                <td><img src="/img/priority/{{ticket.priority | lowercase}}.gif" /></td>
                <td><b>{{ticket.title}}</b></td>
                <td>{{ticket.type}}</td>
                <td>{{ticket.status}}</td>
                <td>
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
                                <a href="#" bs-modal="'partials/modal/cancel.php'" ng-controller="ModalCtrl" bs-tooltip="'Cancel'" class="btn btn-info tw-action-btn"><i class="icon-remove"></i> </a>&nbsp;&nbsp;&nbsp;
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
                </td>
            </tr>
        </tbody>
    </table>
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