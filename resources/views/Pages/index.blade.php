@extends('base')
@section('content')
        <div class="panel panel-default">
            <div class="panel-body">
                <ul>
                    @foreach($albums as $album)
                        <strong>{{ $album->title }}</strong>
                            <p>{{ $album->description }}</p>
                    @endforeach
                </ul>
                {{ $albums->links() }}
            </div>

        </div>
        <div class='row col-sm-8'>
            <div class='img-wrapper'>
                <ul class="rslides">
                    <li>
                        <img src="https://upload.wikimedia.org/wikipedia/en/6/65/KendrickGKMCDeluxe.jpg" alt='imgae1'>
                    </li>
                    <li>
                        <img src="http://2ykov18qyj81ii56523ib0ue.wpengine.netdna-cdn.com/wp-content/uploads/2015/03/kendrick-lamar-TPAB.png" alt='imgae2'>
                    </li>
                    <li>
                        <img src="https://upload.wikimedia.org/wikipedia/en/4/48/Section.80-Cover.jpg" alt='imgae3'>
                    </li>
                </ul>
            </div>
            <div class='img-wrapper'>
                <ul class="rslides">
                    <li>
                        <img src="https://upload.wikimedia.org/wikipedia/en/6/65/KendrickGKMCDeluxe.jpg" alt='imgae1'>
                    </li>
                    <li>
                        <img src="http://2ykov18qyj81ii56523ib0ue.wpengine.netdna-cdn.com/wp-content/uploads/2015/03/kendrick-lamar-TPAB.png" alt='imgae2'>
                    </li>
                    <li>
                        <img src="https://upload.wikimedia.org/wikipedia/en/4/48/Section.80-Cover.jpg" alt='imgae3'>
                    </li>
                </ul>
            </div>
            <div class='img-wrapper'>
                <ul class="rslides">
                    <li>
                        <img src="https://upload.wikimedia.org/wikipedia/en/6/65/KendrickGKMCDeluxe.jpg" alt='imgae1'>
                    </li>
                    <li>
                        <img src="http://2ykov18qyj81ii56523ib0ue.wpengine.netdna-cdn.com/wp-content/uploads/2015/03/kendrick-lamar-TPAB.png" alt='imgae2'>
                    </li>
                    <li>
                        <img src="https://upload.wikimedia.org/wikipedia/en/4/48/Section.80-Cover.jpg" alt='imgae3'>
                    </li>
                </ul>
            </div>
            <div class='img-wrapper'>
                <ul class="rslides">
                    <li>
                        <img src="https://upload.wikimedia.org/wikipedia/en/6/65/KendrickGKMCDeluxe.jpg" alt='imgae1'>
                    </li>
                    <li>
                        <img src="http://2ykov18qyj81ii56523ib0ue.wpengine.netdna-cdn.com/wp-content/uploads/2015/03/kendrick-lamar-TPAB.png" alt='imgae2'>
                    </li>
                    <li>
                        <img src="https://upload.wikimedia.org/wikipedia/en/4/48/Section.80-Cover.jpg" alt='imgae3'>
                    </li>
                </ul>
            </div>
            <div class='img-wrapper'>
                <ul class="rslides">
                    <li>
                        <img src="https://upload.wikimedia.org/wikipedia/en/6/65/KendrickGKMCDeluxe.jpg" alt='imgae1'>
                    </li>
                    <li>
                        <img src="http://2ykov18qyj81ii56523ib0ue.wpengine.netdna-cdn.com/wp-content/uploads/2015/03/kendrick-lamar-TPAB.png" alt='imgae2'>
                    </li>
                    <li>
                        <img src="https://upload.wikimedia.org/wikipedia/en/4/48/Section.80-Cover.jpg" alt='imgae3'>
                    </li>
                </ul>
            </div>
            <div class='img-wrapper'>
                <ul class="rslides">
                    <li>
                        <img src="https://upload.wikimedia.org/wikipedia/en/6/65/KendrickGKMCDeluxe.jpg" alt='imgae1'>
                    </li>
                    <li>
                        <img src="http://2ykov18qyj81ii56523ib0ue.wpengine.netdna-cdn.com/wp-content/uploads/2015/03/kendrick-lamar-TPAB.png" alt='imgae2'>
                    </li>
                    <li>
                        <img src="https://upload.wikimedia.org/wikipedia/en/4/48/Section.80-Cover.jpg" alt='imgae3'>
                    </li>
                </ul>
            </div>
    </div>
@endsection