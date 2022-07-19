<link rel="stylesheet" type="text/css" href="{{ asset('styles/timetable.css') }}">

<div class="tab">
    @foreach($rooms as $room)
        <button class="tablinks" onclick="openRoom(event, '{{ $room->name }}')">{{ $room->name }}</button>
    @endforeach
</div>

@foreach($rooms as $room)
    <div id="{{ $room->name }}" class="tabcontent">
        <div class="container">
            <div class="timetable-img text-center">
                <img src="img/content/timetable.png" alt="">
            </div>
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead>
                    <tr class="bg-light-gray">
                        <th class="text-uppercase">
                            Vaqt
                        </th>
                        <th class="text-uppercase">Dushanba</th>
                        <th class="text-uppercase">Seshanba</th>
                        <th class="text-uppercase">Chorshanba</th>
                        <th class="text-uppercase">Payshanba</th>
                        <th class="text-uppercase">Juma</th>
                        <th class="text-uppercase">Shanba</th>
                        <th class="text-uppercase"></th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($room->groups as $group)
                        @php
                            $time = \App\Models\GroupRoom::getTimeline($group->time);
                            $name = $group->group->name;
                            $group_id = $group->group_id;
                        @endphp
                        <tr>
                            <td class="align-middle">
                                {{ $time }}
                            </td>
                            <td>
                                @if($group->group->day_type == 'odd')
                                    <span class="bg-sky  padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">
                                        <a href="{{ route('platform.groupInfo', ['group' => $group_id]) }}" style="color: white">{{ $name }}</a>
                                    </span>
                                    <div class="margin-10px-top font-size14">Teacher name</div>
                                @endif
                            </td>
                            <td>
                                @if($group->group->day_type == 'even')
                                    <span class="bg-sky  padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">
                                        <a href="{{ route('platform.groupInfo', ['group' => $group_id]) }}" style="color: white">{{ $name }}</a>
                                    </span>
                                    <div class="margin-10px-top font-size14">Teacher name</div>
                                @endif
                            </td>
                            <td>
                                @if($group->group->day_type == 'odd')
                                    <span class="bg-sky  padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">
                                        <a href="{{ route('platform.groupInfo', ['group' => $group_id]) }}" style="color: white">{{ $name }}</a>
                                    </span>
                                    <div class="margin-10px-top font-size14">Teacher name</div>
                                @endif
                            </td>
                            <td>
                                @if($group->group->day_type == 'even')
                                    <span class="bg-sky  padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">
                                        <a href="{{ route('platform.groupInfo', ['group' => $group_id]) }}" style="color: white">{{ $name }}</a>
                                    </span>
                                    <div class="margin-10px-top font-size14">Teacher name</div>
                                @endif
                            </td>
                            <td>
                                @if($group->group->day_type == 'odd')
                                    <span class="bg-sky  padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">
                                        <a href="{{ route('platform.groupInfo', ['group' => $group_id]) }}" style="color: white">{{ $name }}</a>
                                    </span>
                                    <div class="margin-10px-top font-size14">Teacher name</div>
                                @endif
                            </td>
                            <td>
                                @if($group->group->day_type == 'even')
                                    <span class="bg-sky  padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">
                                        <a href="{{ route('platform.groupInfo', ['group' => $group_id]) }}" style="color: white">{{ $name }}</a>
                                    </span>
                                    <div class="margin-10px-top font-size14">Teacher name</div>
                                @endif
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">X</span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endforeach

<script src="{{ asset('scripts/timetable.js') }}" type="text/javascript"></script>
