<div class="well">

    <div class="alert alert-success" style="display: none;">
        This ticket was saved.
    </div>

    <div class="alert alert-error" style="display: none;">
        There was an error saving the ticket.
    </div>

    <form ng-submit="submit()" class="form-horizontal">

        <input type="hidden" ng-model="ticket.id">
        
        <div class="control-group">
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
        </div>

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
            <label class="control-label" for="description">* Description:</label>
            <div class="controls">
                <textarea id="description" ng-model="ticket.description"></textarea>
            </div>
        </div>

        <div class="control-group">
            <div class="controls">
                <button type="submit" class="btn btn-success">Save</button>
            </div>
        </div>

    </form>
</div>
