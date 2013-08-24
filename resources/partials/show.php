
<div>
    <h1>Title: {{ticket.title}}</h1>
    <p>Type: {{ticket.type}}</p>
    <p>Status: {{ticket.status}}</p>
    <p>Priority: {{ticket.priority}}</p>
    <p>Description: {{ticket.description}}</p>
    <a href="#/ticket/{{ticket.id}}/edit" class="btn">Edit</a>
</div>

<div class="tabbable" style="margin-top: 20px;">
    <ul class="nav nav-tabs" id="myTab">
        <li class="active"><a href="#comments" data-toggle="tab">Comments</a></li>
        <li><a href="#activity" data-toggle="tab">Activity</a></li>
    </ul>

    <div class="tab-content">
        <div class="tab-pane active" id="comments">Some comments</div>
        <div class="tab-pane" id="activity">
            <ul>
                <li ng-repeat="activity in ticket.activity">{{activity}}</li>
            </ul>
        </div>
    </div>
</div>
