<?php session_start(); ?>

<ul class="breadcrumb">
    <li><a href="#dash">Home</a> <span class="divider">/</span></li>
    <li class="active">{{ticket.title}}</li>
</ul>

<div>
    <h1>Title: {{ticket.title}}</h1>
    <p>Type: {{ticket.type}}</p>
    <p>Status: {{ticket.status}}</p>
    <p>Priority: {{ticket.priority}}</p>
    <p>Description: {{ticket.description}}</p>
    <?php if ($_SESSION['user']['role'] == 'requestor' OR $_SESSION['user']['role'] == 'approver') : ?>
        <a href="#/ticket/{{ticket.id}}/edit" class="btn">Edit</a>
    <?php endif; ?>
</div>

<div>
    <h3>Activity</h3>
    <div class="tab-pane" id="activity">
        <ul>
            <li ng-repeat="activity in ticket.activity | orderBy:date:reverse">
                {{activity.date}} by {{activity.user}}<br>
                <b>{{activity.field}}: </b>
                {{activity.change}}<br>
                {{activity.comment}}
                <hr>
            </li>
        </ul>
    </div>
</div>  
