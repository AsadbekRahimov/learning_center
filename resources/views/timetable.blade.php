<link rel="stylesheet" type="text/css" href="{{ asset('styles/timetable.css') }}">

<div class="tab">
    @foreach($rooms as $room)
        <button class="tablinks" onclick="openRoom(event, '{{ $room->name }}')">{{ $room->name }}</button>
    @endforeach
</div>

@foreach($rooms as $room)
    <div id="{{ $room->name }}" class="tabcontent">
        <div class="container py-7">
            <div class="row">
                <div class="col-lg-4 mb-3" id="Friday, Nov 13th">
                    <h4 class="mt-0 mb-3 text-dark op-8 font-weight-bold">
                        Toq kunlar
                    </h4>
                    <ul class="list-timeline list-timeline-primary">
                        @foreach($room->groups as $group)
                            @php
                                $time = \App\Models\GroupRoom::getTimeline($group->time, $group->duration);
                                $name = $group->group->name;
                                $group_id = $group->group_id;
                                $teacher = $group->group->teacher->name;
                                $teacher_id = $group->group->teacher_id;
                            @endphp
                            @if($group->group->day_type === 'odd')
                                <li class="list-timeline-item p-0 pb-3 pb-lg-4 d-flex flex-wrap flex-column">
                                    <p class="my-0 text-dark flex-fw text-sm text-uppercase"><span class="text-inverse op-8">{{ $time }}</span> -
                                        <a href="{{ route('platform.groupInfo', ['group' => $group_id]) }}">{{ $name }}</a></p>
                                        <a href="{{ route('platform.teacherInfo', ['teacher' => $teacher_id])  }}"> {{ $teacher }} </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
                <div class="col-lg-4 mb-3" id="Saturday, Nov 14th">
                    <h4 class="mt-0 mb-3 text-dark op-8 font-weight-bold">
                        Juft kunlar
                    </h4>
                    <ul class="list-timeline list-timeline-primary">
                        @foreach($room->groups as $group)
                            @php
                                $time = \App\Models\GroupRoom::getTimeline($group->time, $group->duration);
                                $name = $group->group->name;
                                $group_id = $group->group_id;
                                $teacher = $group->group->teacher->name;
                                $teacher_id = $group->group->teacher_id;
                            @endphp
                            @if($group->group->day_type === 'even')
                                <li class="list-timeline-item p-0 pb-3 pb-lg-4 d-flex flex-wrap flex-column">
                                    <p class="my-0 text-dark flex-fw text-sm text-uppercase"><span class="text-inverse op-8">{{ $time }}</span> -
                                        <a href="{{ route('platform.groupInfo', ['group' => $group_id]) }}">{{ $name }}</a></p>
                                        <a href="{{ route('platform.teacherInfo', ['teacher' => $teacher_id])  }}"> {{ $teacher }} </a>
                                </li>
                            @endif
                        @endforeach
                    </ul>
                </div>
            </div>
        </div>
        {{--<table class="table table-bordered text-center">
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
                            $time = \App\Models\GroupRoom::getTimeline($group->time, $group->duration);
                            $name = $group->group->name;
                            $group_id = $group->group_id;
                            $teacher = $group->group->teacher->name;
                            $teacher_id = $group->group->teacher_id;
                        @endphp
                        <tr>
                            <td class="align-middle">
                                {{ $time }}
                            </td>
                            <td>
                                @if($group->group->day_type == 'odd')
                                    <span class="bg-sky  text-white font-size16 xs-font-size13">
                                        <a href="{{ route('platform.groupInfo', ['group' => $group_id]) }}" style="color: white">{{ $name }}</a>
                                    </span>
                                    <div class="margin-10px-top font-size14">
                                        <a href="{{ route('platform.teacherInfo', ['teacher' => $teacher_id])  }}"> {{ $teacher }} </a>
                                    </div>
                                @endif
                            </td>
                            <td>
                                @if($group->group->day_type == 'even')
                                    <span class="bg-sky text-white font-size16 xs-font-size13">
                                        <a href="{{ route('platform.groupInfo', ['group' => $group_id]) }}" style="color: white">{{ $name }}</a>
                                    </span>
                                    <div class="margin-10px-top font-size14">
                                        <a href="{{ route('platform.teacherInfo', ['teacher' => $teacher_id])  }}"> {{ $teacher }} </a>
                                    </div>
                                @endif
                            </td>
                            <td>
                                @if($group->group->day_type == 'odd')
                                    <span class="bg-sky text-white font-size16 xs-font-size13">
                                        <a href="{{ route('platform.groupInfo', ['group' => $group_id]) }}" style="color: white">{{ $name }}</a>
                                    </span>
                                    <div class="margin-10px-top font-size14">
                                        <a href="{{ route('platform.teacherInfo', ['teacher' => $teacher_id])  }}"> {{ $teacher }} </a>
                                    </div>
                                @endif
                            </td>
                            <td>
                                @if($group->group->day_type == 'even')
                                    <span class="bg-sky text-white font-size16 xs-font-size13">
                                        <a href="{{ route('platform.groupInfo', ['group' => $group_id]) }}" style="color: white">{{ $name }}</a>
                                    </span>
                                    <div class="margin-10px-top font-size14">
                                        <a href="{{ route('platform.teacherInfo', ['teacher' => $teacher_id])  }}"> {{ $teacher }} </a>
                                    </div>
                                @endif
                            </td>
                            <td>
                                @if($group->group->day_type == 'odd')
                                    <span class="bg-sky text-white font-size16 xs-font-size13">
                                        <a href="{{ route('platform.groupInfo', ['group' => $group_id]) }}" style="color: white">{{ $name }}</a>
                                    </span>
                                    <div class="margin-10px-top font-size14">
                                        <a href="{{ route('platform.teacherInfo', ['teacher' => $teacher_id])  }}"> {{ $teacher }} </a>
                                    </div>
                                @endif
                            </td>
                            <td>
                                @if($group->group->day_type == 'even')
                                    <span class="bg-sky text-white font-size16 xs-font-size13">
                                        <a href="{{ route('platform.groupInfo', ['group' => $group_id]) }}" style="color: white">{{ $name }}</a>
                                    </span>
                                    <div class="margin-10px-top font-size14">
                                        <a href="{{ route('platform.teacherInfo', ['teacher' => $teacher_id])  }}"> {{ $teacher }} </a>
                                    </div>
                                @endif
                            </td>
                            <td>
                                <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">
                                    <a href="{{ route('deleteGroupRoom', ['id' => $group->id]) }}" style="color: white">X</a>
                                </span>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>--}}
    </div>
@endforeach

<script src="{{ asset('scripts/timetable.js') }}" type="text/javascript"></script>
