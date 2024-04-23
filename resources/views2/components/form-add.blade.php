<div class="card">
    <div class="card-body">
        <form class="forms-sample pt-3" action="{{ route($routeTo) }}" method="POST" enctype="multipart/form-data">
            {{$slot}}                       
            <button type="submit" class="btn btn-success mr-2"> Submit </button>
            <button type="reset" class="btn btn-danger">Cancel</button>
        </form>
    </div>
</div>