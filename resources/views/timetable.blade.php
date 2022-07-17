<link rel="stylesheet" type="text/css" href="{{ asset('styles/timetable.css') }}">

<div class="tab">
    <button class="tablinks" onclick="openRoom(event, 'London')">Xona 1</button>
    <button class="tablinks" onclick="openRoom(event, 'Paris')">Xona 2</button>
    <button class="tablinks" onclick="openRoom(event, 'Tokyo')">Xona 3</button>
</div>

<div id="London" class="tabcontent">
    <div class="container">
        <div class="timetable-img text-center">
            <img src="img/content/timetable.png" alt="">
        </div>
        <div class="table-responsive">
            <table class="table table-bordered text-center">
                <thead>
                <tr class="bg-light-gray">
                    <th class="text-uppercase">Time
                    </th>
                    <th class="text-uppercase">Monday</th>
                    <th class="text-uppercase">Tuesday</th>
                    <th class="text-uppercase">Wednesday</th>
                    <th class="text-uppercase">Thursday</th>
                    <th class="text-uppercase">Friday</th>
                    <th class="text-uppercase">Saturday</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                    <td class="align-middle">09:00am</td>
                    <td>
                        <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13">Dance</span>
                        <div class="margin-10px-top font-size14">9:00-10:00</div>
                        <div class="font-size13 text-light-gray">Ivana Wong</div>
                    </td>
                    <td>
                        <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Yoga</span>
                        <div class="margin-10px-top font-size14">9:00-10:00</div>
                        <div class="font-size13 text-light-gray">Marta Healy</div>
                    </td>

                    <td>
                        <span class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Music</span>
                        <div class="margin-10px-top font-size14">9:00-10:00</div>
                        <div class="font-size13 text-light-gray">Ivana Wong</div>
                    </td>
                    <td>
                        <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Dance</span>
                        <div class="margin-10px-top font-size14">9:00-10:00</div>
                        <div class="font-size13 text-light-gray">Ivana Wong</div>
                    </td>
                    <td>
                        <span class="bg-purple padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Art</span>
                        <div class="margin-10px-top font-size14">9:00-10:00</div>
                        <div class="font-size13 text-light-gray">Kate Alley</div>
                    </td>
                    <td>
                        <span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">English</span>
                        <div class="margin-10px-top font-size14">9:00-10:00</div>
                        <div class="font-size13 text-light-gray">James Smith</div>
                    </td>
                </tr>

                <tr>
                    <td class="align-middle">10:00am</td>
                    <td>
                        <span class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Music</span>
                        <div class="margin-10px-top font-size14">10:00-11:00</div>
                        <div class="font-size13 text-light-gray">Ivana Wong</div>
                    </td>
                    <td class="bg-light-gray">

                    </td>
                    <td>
                        <span class="bg-purple padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Art</span>
                        <div class="margin-10px-top font-size14">10:00-11:00</div>
                        <div class="font-size13 text-light-gray">Kate Alley</div>
                    </td>
                    <td>
                        <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Yoga</span>
                        <div class="margin-10px-top font-size14">10:00-11:00</div>
                        <div class="font-size13 text-light-gray">Marta Healy</div>
                    </td>
                    <td>
                        <span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">English</span>
                        <div class="margin-10px-top font-size14">10:00-11:00</div>
                        <div class="font-size13 text-light-gray">James Smith</div>
                    </td>
                    <td class="bg-light-gray">

                    </td>
                </tr>

                <tr>
                    <td class="align-middle">11:00am</td>
                    <td>
                        <span class="bg-lightred padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Break</span>
                        <div class="margin-10px-top font-size14">11:00-12:00</div>
                    </td>
                    <td>
                        <span class="bg-lightred padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Break</span>
                        <div class="margin-10px-top font-size14">11:00-12:00</div>
                    </td>
                    <td>
                        <span class="bg-lightred padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Break</span>
                        <div class="margin-10px-top font-size14">11:00-12:00</div>
                    </td>
                    <td>
                        <span class="bg-lightred padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Break</span>
                        <div class="margin-10px-top font-size14">11:00-12:00</div>
                    </td>
                    <td>
                        <span class="bg-lightred padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Break</span>
                        <div class="margin-10px-top font-size14">11:00-12:00</div>
                    </td>
                    <td>
                        <span class="bg-lightred padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Break</span>
                        <div class="margin-10px-top font-size14">11:00-12:00</div>
                    </td>
                </tr>

                <tr>
                    <td class="align-middle">12:00pm</td>
                    <td class="bg-light-gray">

                    </td>
                    <td>
                        <span class="bg-purple padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Art</span>
                        <div class="margin-10px-top font-size14">12:00-1:00</div>
                        <div class="font-size13 text-light-gray">Kate Alley</div>
                    </td>
                    <td>
                        <span class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Dance</span>
                        <div class="margin-10px-top font-size14">12:00-1:00</div>
                        <div class="font-size13 text-light-gray">Ivana Wong</div>
                    </td>
                    <td>
                        <span class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Music</span>
                        <div class="margin-10px-top font-size14">12:00-1:00</div>
                        <div class="font-size13 text-light-gray">Ivana Wong</div>
                    </td>
                    <td class="bg-light-gray">

                    </td>
                    <td>
                        <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Yoga</span>
                        <div class="margin-10px-top font-size14">12:00-1:00</div>
                        <div class="font-size13 text-light-gray">Marta Healy</div>
                    </td>
                </tr>

                <tr>
                    <td class="align-middle">01:00pm</td>
                    <td>
                        <span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">English</span>
                        <div class="margin-10px-top font-size14">1:00-2:00</div>
                        <div class="font-size13 text-light-gray">James Smith</div>
                    </td>
                    <td>
                        <span class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Music</span>
                        <div class="margin-10px-top font-size14">1:00-2:00</div>
                        <div class="font-size13 text-light-gray">Ivana Wong</div>
                    </td>
                    <td class="bg-light-gray">

                    </td>
                    <td>
                        <span class="bg-pink padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">English</span>
                        <div class="margin-10px-top font-size14">1:00-2:00</div>
                        <div class="font-size13 text-light-gray">James Smith</div>
                    </td>
                    <td>
                        <span class="bg-green padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Yoga</span>
                        <div class="margin-10px-top font-size14">1:00-2:00</div>
                        <div class="font-size13 text-light-gray">Marta Healy</div>
                    </td>
                    <td>
                        <span class="bg-yellow padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16  xs-font-size13">Music</span>
                        <div class="margin-10px-top font-size14">1:00-2:00</div>
                        <div class="font-size13 text-light-gray">Ivana Wong</div>
                    </td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script src="{{ asset('scripts/timetable.js') }}" type="text/javascript"></script>
