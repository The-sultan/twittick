<form ng-submit="submitCancelTicket(ticket.id)">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
        <h3>Cancel ticket: {{ticket.title}}</h3>
    </div>
    <div class="modal-body">

        <input type="hidden" ng-model="ticket.id">
        <input type="hidden" ng-model="ticket.status_id" value="3">

        <div class="control-group">
            <label class="control-label" for="comment">* Comment:</label>
            <div class="controls row-fluid">
                <textarea id="comment" ng-model="ticket.comment" required class="span12" style="resize: vertical;"></textarea>
            </div>
        </div>

    </div>
    <div class="modal-footer">
        <a href="#" class="btn" data-dismiss="modal">Close</a>
        <button type="submit" class="btn btn-warning">Cancel ticket</button>
    </div>
</form>