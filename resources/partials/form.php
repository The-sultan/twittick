<div ng-switch on="selection">
    <div ng-switch-when="new">
        <ul class="breadcrumb">
            <li><a href="#dash">Home</a> <span class="divider">/</span></li>
            <li class="active">Create</li>
        </ul>
    </div>
    <div ng-switch-default>
        <ul class="breadcrumb">
            <li><a href="#dash">Home</a> <span class="divider">/</span></li>
            <li><a href="#ticket/{{ticket.id}}">{{ticket.title}}</a> <span class="divider">/</span>            </li>
            <li class="active">Edit</li>
        </ul>
    </div>
</div>

<div class="well">

    <form ng-submit="submit()" class="form-horizontal">

        <input type="hidden" ng-model="ticket.id">
        <input type="hidden" ng-model="ticket.status_id" value="{{ticket.status_id}}">

        <!--        <div class="control-group">
                    <label class="control-label" for="status">* Status:</label>
                    <div class="controls">
                        <select id="status" ng-model="ticket.status_id" required>
                            <option value="1">NEW</option>
                            <option value="2">APPROVED</option>
                            <option value="3">CANCELLED</option>
                            <option value="4">REJECTED</option>
                            <option value="5">DONE</option>
                        </select>
                    </div>
                </div>-->

        <div class="control-group">
            <label class="control-label" for="title">* Title:</label>
            <div class="controls">
                <input type="text" id="title" class="input-xlarge" ng-model="ticket.title" required>
            </div>
        </div>

        <!--        <div class="control-group">
                    <label class="control-label" for="due-date">* Due date:</label>
                    <div class="controls">
                        <div id="due-date-date" class="input-append">
                            <input data-format="yyyy-MM-dd" type="text" ng-model="ticket.due_date" required>
                            <span class="add-on">
                                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span>
                        </div>
                        <div id="due-date-time" class="input-append">
                            <input data-format="hh:mm" type="text" ng-model="ticket.due_time" required>
                            <span class="add-on">
                                <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span>
                        </div>
                    </div>
                </div>-->

        <div class="control-group">
            <label class="control-label" for="type">* Type:</label>
            <div class="controls">
                <select id="type" ng-model="ticket.type_id" required>
                    <option value=""></option>
                    <option value="1">Applications</option>
                    <option value="2">Connectivity</option>
                    <option value="3">Hardware</option>
                    <option value="4">Merchandising</option>
                    <option value="5">Security</option>
                </select>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="priority">* Priority:</label>
            <div class="controls">
                <select id="priority" ng-model="ticket.priority_id" required>
                    <option value=""></option>
                    <option value="1">Critical</option>
                    <option value="2">High</option>
                    <option value="3">Medium</option>
                    <option value="4">Low</option>
                </select>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label" for="due-date">* Due date:</label>
            <div class="input-append">
                <input type="text" class="input-small" ng-model="datepicker.date" data-date-format="mm/dd/yyyy" bs-datepicker>
                <button type="button" class="btn" data-toggle="datepicker"><i class="icon-calendar"></i></button>
            </div>
            <div class="input-append">
                <input type="text" class="input-small" ng-model="timepicker.time" bs-timepicker>
                <button type="button" class="btn" data-toggle="timepicker"><i class="icon-time"></i></button>
            </div>
            <label class="checkbox">
                <input type="checkbox"> Has due date?
            </label>
        </div>

        <div class="control-group">
            <label class="control-label" for="description">* Description:</label>
            <div class="controls">
                <textarea id="description" ng-model="ticket.description" required maxlength="30"></textarea>
                <br>
                <small>Be as detailed as possible</small>
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">Attachments:</label>
            <div class="controls">
                <small>Attachments</small>
            </div>
        </div>

        <div class="control-group">
            <div class="controls">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </div>

    </form>
</div>

