@extends("layouts.app")
@section("content")

    <div class="container">
        <div class="row">
            <div class="col-lg-4">
                <div class="container py-5">
                    <h3>Add New Task</h3>
                    <hr>
                    <form id="create-task">
                        <div class="row">
                            <div class="mb-3">
                                <label class="form-check-label" for="task">Task</label>
                                <input type="text" class="form-control" placeholder="Task" id="task" name="task">
                            </div>
                            <div class="mb-3">
                                <label class="form-check-label" for="status">Status:</label>							
            
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio1" value="option1">
                                    <label class="form-check-label" for="inlineRadio1">Pending</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadio2" value="option2">
                                    <label class="form-check-label" for="inlineRadio2">Done</label>
                                </div>
                            </div>
                            <hr>
                            <div class="mb-3">
                                <button type="submit" class="btn btn-danger">Add</button>								
                            </div>
                        </div>
                    </form>
                </div>            
            </div>

            <div class="col-lg-8">
                <div class="container py-5">
                    <h3>All Task List</h3>
                    <hr>
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Task</th>
                                <th>Status</th>
                                <th>Update</th>
            
                            </tr>
                        </thead>
                        <tbody>
            
                            @foreach ($tasks as $task)
                            <tr>
                                <td>{{ $task->id }}</td>
                                <td>{{ $task->task }}</td>
                                <td>{{ $task->status }}</td>
                                <td>
                                    <form id="{{ $task->id }}">
                                        <div class="row">
                                            <div class="form-check form-check-inline">
                                                <input type="hidden" class="form-check-input" name="status" id="status{{ $task->id }}" value="{{ $task->status }}">
                                            </div>
                                            <div class="col">
                                                <button type="submit" class="btn btn-danger btn-sm">Change Status</button>								
                                            </div>
                                        </div>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
<script type="text/javascript">
    function create_task(){
		let task = $('#task').val();
		let status = '';
		if($("#inlineRadio2").prop("checked") == true)
			status = 'Done';
		else if ($("#inlineRadio1").prop("checked") == true)
			status = 'Pending';
		$.ajax({
			url: "/task/add",
			type:"POST",
			headers:{
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			data:{
				task:task,
				status:status,
			},
			success:function(response){
				console.log(response);
				window.location = "{{ route('profile') }}";
			},
		});
	}

    function update_task(id) {
		let status = $("#status"+id).val();
		if(status!='Done')
			status = 'Done'
		else
			status = 'Pending'		
		$.ajax({
			url: "/task/status/"+id,
			type:"POST",
			headers:{
				'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
			},
			data:{
				status:status,
			},
			success:function(response){
				console.log(response);
				window.location = "{{ route('profile') }}";
			},
		});
	}

    $('form').submit(function(e) {
		e.preventDefault();
		var id = $(this).prop('id');
		if (id != 'create-task')
			update_task(id);
		else
			create_task();
	});

</script>
@endsection

