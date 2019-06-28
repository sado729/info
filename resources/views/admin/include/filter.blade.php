<div class="col-md-12 my-2">
    <form class="form-inline" action="{{ route($route) }}" method="get" id="filterform">
        <div class="col-md-4">
            <div class="form-group">
                <label>
                    Göstər <select name="length" aria-controls="example1" class="form-control input-sm  mx-sm-3 " onchange="this.form.submit()">
                        <option value="0">0</option>
                        <option value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                    </select> element
                </label>
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group">
                {{ $list->appends('search',old('search'))->appends('length',old('length'))->links() }}
            </div>
        </div>
        <div class="col-md-4">
            <div class="form-group float-right">
                <div id="example1_filter">
                    <label>
                        Axtar:<input type="search" id="search" class="form-control input-sm  mx-sm-3 " placeholder="Search..." onchange="this.form.submit()" name="search" value="{{ old('search') }}">
                    </label>
                </div>
            </div>
        </div>
        <input type="submit" class="d-none">
    </form>
</div>