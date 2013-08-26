<?php session_start(); ?>

<div class="alert alert-success">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
    <strong>Cool!</strong> The ticket was successfully removed. <a href="#"><i class="icon-undo"></i> Undo</a>.
</div>

<div>

    Search: <input ng-model="query"> /
    Sort by: 
    <select ng-model="orderProp">
        <option value="title">title</option>
        <option value="status_id">status</option>
        <option value="priority_id">priority</option>
        <option value="type_id">type</option>
        <option value="description">description</option>
    </select>

</div>


<div>
    <table class="table">
        <thead>
            <tr>
                <th>Title</th>
                <th>Type</th>
                <th>Status</th>
                <th>Priority</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <tr ng-repeat="ticket in tickets | filter:query | orderBy:orderProp" class="tw-{{ticket.priority | lowercase}}">
                <td><b>{{ticket.title}}</b></td>
                <td>{{ticket.type}}</td>
                <td>{{ticket.status}}</td>
                <td>{{ticket.priority}}</td>
                <td>
                    <?php if ($_SESSION['user_username'] == 'r') : ?>

                        <div ng-switch on="ticket.status">
                            <div ng-switch-when="NEW">
                                <a href="#/ticket/{{ticket.id}}"><i class="icon-eye-open"></i> View</a>&nbsp;&nbsp;&nbsp;
                                <a href="#/ticket/{{ticket.id}}/edit"><i class="icon-edit"></i> Edit</a>&nbsp;&nbsp;&nbsp;
                                <a href="#" ng-click="cancelTicket(ticket.id)"><i class="icon-remove"></i> Cancel</a>&nbsp;&nbsp;&nbsp;
                                <a href="#" ng-click="deleteTicket(ticket.id)"><i class="icon-trash"></i> Delete</a>
                            </div>
                            <div ng-switch-when="APPROVED">
                                <a href="#/ticket/{{ticket.id}}"><i class="icon-eye-open"></i> View</a>&nbsp;&nbsp;&nbsp;
                                <a href="#" bs-modal="'partials/modal/cancel.php'"><i class="icon-remove"></i> Cancel</a>&nbsp;&nbsp;&nbsp;
                                <a href="#" ng-click="deleteTicket(ticket.id)"><i class="icon-trash"></i> Delete</a>
                            </div>
                            <div ng-switch-default>
                                <a href="#/ticket/{{ticket.id}}"><i class="icon-eye-open"></i> View</a>&nbsp;&nbsp;&nbsp;
                                <a href="#" ng-click="deleteTicket(ticket.id)"><i class="icon-trash"></i> Delete</a>
                            </div>
                        </div>

                    <?php elseif ($_SESSION['user_username'] == 'a') : ?>
                        <div ng-switch on="ticket.status">
                            <div ng-switch-when="NEW">
                                <a href="#/ticket/{{ticket.id}}"><i class="icon-eye-open"></i> View</a>&nbsp;&nbsp;&nbsp;
                                <a href="#/ticket/{{ticket.id}}/edit"><i class="icon-edit"></i> Edit</a>&nbsp;&nbsp;&nbsp;
                                <a href="#" ng-click="approveTicket(ticket.id)"><i class="icon-thumbs-up"></i> Approve</a>&nbsp;&nbsp;&nbsp;
                                <a href="#" ng-click="rejectTicket(ticket.id)"><i class="icon-thumbs-down"></i> Reject</a>&nbsp;&nbsp;&nbsp;
                                <a href="#" ng-click="cancelTicket(ticket.id)"><i class="icon-remove"></i> Cancel</a>&nbsp;&nbsp;&nbsp;
                            </div>
                            <div ng-switch-when="APPROVED">
                                <a href="#/ticket/{{ticket.id}}"><i class="icon-eye-open"></i> View</a>&nbsp;&nbsp;&nbsp;
                                <a href="#/ticket/{{ticket.id}}/edit"><i class="icon-edit"></i> Edit</a>&nbsp;&nbsp;&nbsp;
                            </div>
                            <div ng-switch-default>
                                <a href="#/ticket/{{ticket.id}}"><i class="icon-eye-open"></i> View</a>
                            </div>
                        </div>
                    <?php elseif ($_SESSION['user_username'] == 'e') : ?>
                     <div ng-switch on="ticket.status">
                            <div ng-switch-when="APPROVED">
                                <a href="#/ticket/{{ticket.id}}"><i class="icon-eye-open"></i> View</a>&nbsp;&nbsp;&nbsp;
                                <a href="#" ng-click="doneTicket(ticket.id)"><i class="icon-check"></i> Mark as Done</a>
                            </div>
                            <div ng-switch-default>
                                <a href="#/ticket/{{ticket.id}}"><i class="icon-eye-open"></i> View</a>
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