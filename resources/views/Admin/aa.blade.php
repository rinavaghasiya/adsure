 <table class="main__table" id="myTable">
     <thead>
         <tr>
             <th><strong>Date</strong></th>
             <th><strong>Package Name</strong></th>
             <th><strong>Adunit</strong></th>
             <th><strong>Impression </strong></th>
             <th><strong>Clicks</strong></th>
             <th><strong>CTR</strong></th>
             <th><strong>Ad Request</strong></th>
             <th><strong>Matched Ad Request</strong></th>
             <th><strong>Coverage</strong></th>
             <th><strong>Revenue(USD)</strong></th>
             <th><strong>Ae eCPM</strong></th>
         </tr>

     </thead>

     <tbody>
         @foreach ($data as $user)
             <tr>

                 <td>
                     <div class="main__table-text">{{ $user->date }}</div>
                 </td>
                 <td>
                     <div class="main__table-text">{{ $user->packagename }}
                     </div>
                 </td>
                 <td>
                     <div class="main__table-text">{{ $user->adunit }}</div>
                 </td>
                 <td>
                     <div class="main__table-text">{{ $user->impressions }}</div>
                 </td>
                 <td>
                     <div class="main__table-text">{{ $user->clicks }}</div>
                 </td>
                 <td>
                     <div class="main__table-text">{{ $user->adrequest }}</div>
                 </td>
                 <td>
                     <div class="main__table-text">{{ $user->matchadrequest }}</div>
                 </td>
                 <td>
                     <div class="main__table-text">{{ $user->ctr }}</div>
                 </td>
                 <td>
                     <div class="main__table-text">{{ $user->coverage }}</div>
                 </td>
                 <td>
                     <div class="main__table-text">{{ $user->revenue }}</div>
                 </td>
                 <td>
                     <div class="main__table-text">{{ $user->adecpm }}</div>
                 </td>
             </tr>
         @endforeach
     </tbody>
 </table>




 <div class="pagination-bar text-center" style="float: left;">
     <nav aria-label="Page navigation " class="d-inline-b">
         <ul class="pagination">
             <li class="page-item">
                 {{ $data->appends(\Request::except('_token'))->render() }}

             </li>
         </ul>
     </nav>
 </div>



 function datewise() {
 var from_date = $('#from').val();
 var to_date = $('#to').val();



 if (from_date != '' && to_date != '') {
 var filter, table, tr, td, i;
 // filter = from_date.toUpperCase();
 // filter1 = to_date.toUpperCase();
 table = document.getElementById("myTable");
 tr = table.getElementsByTagName("tr");
 for (i = 0; i < tr.length; i++) { td_date=tr[i].getElementsByTagName("td")[0]; if (td) { if
     (td.innerHTML.toUpperCase().indexOf(filter)> -1 || td.innerHTML.toUpperCase().indexOf(
     filter1) > -1) {
     tr[i].style.display = "";
     } else {
     tr[i].style.display = "none";
     }
     }
     // if (td_date) {
     // if (td_date >= from_date && td_date <= to_date) { // tr[i].style.display="" ; // } else { //
         <script type="text/javascript">
             document.getElementById('pagination').onchange = function() {
                 window.location = "{{ $data->url(1) }}&items=" + this.value;
             };

             function myFunction() {
                 var input, filter, table, tr, td, i, txtValue;
                 input = document.getElementById("search");
                 filter = input.value.toUpperCase();
                 table = document.getElementById("myTable");
                 tr = table.getElementsByTagName("tr");

                 for (i = 0; i < tr.length; i++) {
                     td = tr[i].getElementsByTagName("td");
                     tr[i].style.display = "none";
                     for (j = 0; j < td.length; j++) {
                         if (td[j].innerHTML.toUpperCase().indexOf(filter) > -1) {
                             tr[i].style.display = "";
                         }
                     }
                 }
             }


             function mystatus() {
                 var input, filter, table, tr, td, i;
                 input = document.getElementById("mylist");
                 filter = input.value.toUpperCase();

                 console.log(filter);
                 table = document.getElementById("myTable");
                 tr = table.getElementsByTagName("tr");

                 for (i = 0; i < tr.length; i++) {
                     td = tr[i].getElementsByTagName("td")[2];
                     if (td) {
                         if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                             tr[i].style.display = "";
                         } else {
                             tr[i].style.display = "none";
                         }
                     }

                 }
             }


             function today() {
                 var date = new Date();
                 var d = date.getDate();
                 var m = date.getMonth() + 1;
                 var y = date.getFullYear();

                 if (m <= 9) {
                     m = 0 + '' + m;
                 }
                 if (d <= 9) {
                     d = 0 + '' + d;
                 }
                 var dd = y + '-' + m + '-' +
                 d; // var yesterday=new Date(Date.now() - 864e5); var filter, table, tr, td, i; filter=dd.toUpperCase(); table=document.getElementById("myTable"); tr=table.getElementsByTagName("tr"); for (i=0; i < tr.length; i++) { td=tr[i].getElementsByTagName("td")[0]; if (td) { if (td.innerHTML.toUpperCase().indexOf(filter)> -1) {
                 tr[i].style.display = "";
             } else {
                 tr[i].style.display = "none";
             }
             }
             }
             }


             function yesterday() {
                 var date = new Date(Date.now() - 864e5);
                 var d = date.getDate();
                 var m = date.getMonth() + 1;
                 var y = date.getFullYear();

                 if (m <= 9) {
                     m = 0 + '' + m;
                 }
                 if (d <= 9) {
                     d = 0 + '' + d;
                 }
                 var dd = y + '-' + m + '-' + d;
                 var filter, table, tr, td, i;
                 filter = dd.toUpperCase();
                 table = document.getElementById("myTable");
                 tr = table.getElementsByTagName("tr");
                 for (i = 0; i < tr.length; i++) {
                     td = tr[i].getElementsByTagName("td")[0];
                     if (td) {
                         if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
                             tr[i].style.display =
                         } else {
                             tr[i].style.display = "none";
                         }
                     }
                 }
             }


             // var date = new Date(Date.now() - 7 * 24 * 60 * 60 * 1000);
             // var d = date.getDate();
             // var m = date.getMonth() + 1;
             // var y = date.getFullYear();
             // if (m <= 9) { // m=0 + '' + m; // } // if (d <=9) { // d=0 + '' + d; // } // var dd=y + '-' + m + '-' + d; // var date1=new Date(Date.now()); // var d1=date1.getDate(); // var m1=date1.getMonth() + 1; // var y1=date1.getFullYear(); // if (m1 <=9) { // m1=0 + '' + m1; // } // if (d1 <=9) { // d1=0 + '' + d1; // } // var dd1=y1 + '-' + m1 + '-' + d1; // var filter, table, tr, td, i; // filter=dd.toUpperCase(); // filter1=dd1.toUpperCase(); // table=document.getElementById("myTable"); // tr=table.getElementsByTagName("tr"); // for (i=0; i < tr.length; i++) { // td=tr[i].getElementsByTagName("td")[0]; // if (td) { // if (td.innerHTML.toUpperCase().indexOf(filter)> -1 || td.innerHTML.toUpperCase().indexOf(filter1) > -
             // 1) {
             // tr[i].style.display = "";
             // } else {
             // tr[i].style.display = "none";
             // }
             // }
             // }


             function lastseven() {
                 var date = new Date();
                 date.setDate(date.getDate() - 7);

                 var d1 = date.getDate();
                 var m1 = date.getMonth() + 1;
                 var y1 = date.getFullYear();
                 if (m1 <= 9) {
                     m1 = 0 + '' + m1;
                 }
                 if (d1 <= 9) {
                     d1 = 0 + '' + d1;
                 }
                 var dd1 = y1 + '-' + m1 + '-' + d1;
                 var date1 = new Date(Date.now());
                 var d = date1.getDate();
                 var m = date1.getMonth() + 1;
                 var y = date1.getFullYear();
                 if (m <= 9) {
                     m = 0 + '' + m;
                 }
                 if (d <= 9) {
                     d = 0 + '' + d;
                 }
                 var dd = y + '-' + m + '-' +
                 d; // alert(dd1); var filter, table, tr, td, i; filter=dd1.toUpperCase(); filter1=dd.toUpperCase(); // alert(filter); // alert(filter1); table=document.getElementById("myTable"); tr=table.getElementsByTagName("tr"); for (i=0; i < tr.length; i++) { td=tr[i].getElementsByTagName("td")[0].innerHTML; // alert(); if (td) { if (td>= filter && td <= filter1) { tr[i].style.display="" ; } else { tr[i].style.display="none" ; } } } } // function searchDate() { // var input_startDate, input_stopDate, table, tr, i; // input_startDate=new Date(document.getElementById("from").value); // input_stopDate=new Date(document.getElementById("to").value); // var d=input_startDate.getDate(); // var m=input_startDate.getMonth() + 1; // var y=input_startDate.getFullYear(); // if (m <=9) { // m=0 + '' + m; // } // if (d <=9) { // d=0 + '' + d; // } // var start=y + '-' + m + '-' + d; // var d1=input_stopDate.getDate(); // var m1=input_stopDate.getMonth() + 1; // var y1=input_stopDate.getFullYear(); // if (m1 <=9) { // m1=0 + '' + m1; // } // if (d1 <=9) { // d1=0 + '' + d1; // } // var tod=y1 + '-' + m1 + '-' + d1; // // alert(start); // // alert(tod); // table=document.getElementById("myTable"); // tr=table.getElementsByTagName("tr"); // for (i=0; i < tr.length; i++) { // td_date=tr[i].getElementsByTagName("td")[0]; // if (td_date) { // if (td_date>= start && td_date <= tod) { // tr[i].style.display="" ; // } else { // tr[i].style.display="none" ; // } // } // } // } 
         </script>
