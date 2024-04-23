<div class="card">
    <h4 class="card-title bg-color p-3 text-light rounded-top">
        {{ $titleTable }}    
    </h4>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-striped">
                {{ $slot }}
            </table>
        </div>
    </div>
</div>