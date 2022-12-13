 function create_chart(id, config) {
     new Chart(document.getElementById(id), config);
 }

 $.ajax({
     type: "Post",
     url: "ajax-chart.php",
     data: ({
         isset_create_order_doughnut_chart: '1'
     }),
     success: function (response) {
         var json_response = JSON.parse(response);
         var confirmed = json_response[0]['Confirmed']
         var processing = json_response[0]['Processing']
         var out_for_delivery = json_response[0]['Out_For_Delivery']
         var delivered = json_response[0]['Delivered']
         var cancelled = json_response[0]['Cancelled']

         var config = {
             type: 'doughnut',
             data: {
                 labels: ['Confirmed', 'Processing', 'Out For Delivery', 'Delivered', 'Cancelled'],
                 datasets: [{
                     data: [confirmed, processing, out_for_delivery, delivered, cancelled],
                     backgroundColor: ['#0d6efd', '#ffc107', '#198754', '#0dcaf0', '#dc3545'],

                 }]
             },

             options: {
                 responsive: false,
                 plugins: {
                     legend: {
                         display: false,
                         position: 'top',
                     },
                     title: {
                         display: false,
                         text: 'Order Status'
                     },
                     layout: {
                         padding: 0
                     }
                 }
             },
         }

         create_chart('chart-1', config)

     }
 });

 function create_line_chart() {

     $.ajax({
         type: "Post",
         url: "ajax-chart.php",
         data: ({
             isset_create_order_line_chart: '1'
         }),
         success: function (response) {
              console.log(response);
             var json_response = JSON.parse(response);
             var title = json_response['title'];
             var config = {
                 type: 'line',
                 data: {
                     labels: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
                     datasets: [{
                             label: 'Confirmed',
                             data: [json_response['Confirmed']['Jan'], json_response['Confirmed']['Feb'], json_response['Confirmed']['Mar'], json_response['Confirmed']['Apr'], json_response['Confirmed']['May'], json_response['Confirmed']['Jun'], json_response['Confirmed']['Jul'], json_response['Confirmed']['Aug'], json_response['Confirmed']['Sep'], json_response['Confirmed']['Oct'], json_response['Confirmed']['Nov'], json_response['Confirmed']['Dec']],
                             borderColor: '#0d6efd',
                             pointStyle: 'circle',
                             pointRadius: 5,
                             pointHoverRadius: 10,
                             tension: .5,
                             fill: true,
                             backgroundColor: "#e6f0ff",
                         },
                         {
                             label: 'Delivered',
                             data: [json_response['Delivered']['Jan'], json_response['Delivered']['Feb'], json_response['Delivered']['Mar'], json_response['Delivered']['Apr'], json_response['Delivered']['May'], json_response['Delivered']['Jun'], json_response['Delivered']['Jul'], json_response['Delivered']['Aug'], json_response['Delivered']['Sep'], json_response['Delivered']['Oct'], json_response['Delivered']['Nov'], json_response['Delivered']['Dec']],
                             borderColor: '#0dcaf0',
                             pointStyle: 'circle',
                             pointRadius: 5,
                             pointHoverRadius: 10,
                             tension: .5,
                             fill: true,
                             backgroundColor: "#ccffff",
                         },
                         {
                             label: 'Cancelled',
                             data: [json_response['Cancelled']['Jan'], json_response['Cancelled']['Feb'], json_response['Cancelled']['Mar'], json_response['Cancelled']['Apr'], json_response['Cancelled']['May'], json_response['Cancelled']['Jun'], json_response['Cancelled']['Jul'], json_response['Cancelled']['Aug'], json_response['Cancelled']['Sep'], json_response['Cancelled']['Oct'], json_response['Cancelled']['Nov'], json_response['Cancelled']['Dec']],
                             borderColor: '#dc3545',
                             pointStyle: 'circle',
                             pointRadius: 5,
                             pointHoverRadius: 10,
                             tension: .5,
                             fill: true,
                             backgroundColor: '#ffb3b3'
                         },
                     ]
                 },

                 options: {
                     responsive: false,
                     plugins: {
                         legend: {
                             display: true,
                             position: 'top',
                         },
                         title: {
                             display: true,
                             text: title,
                             position:'bottom'
                         },
                         layout: {
                             padding: 0
                         }
                     }
                 },
             }

             create_chart('chart-2', config)


         }
     });

 }

 create_line_chart()

 function set_order_line_map(data) {
     $.ajax({
         type: "post",
         url: "ajax-chart.php",
         data: ({
             isset_create_line_chart: '1',
             data: data
         }),
         success: function (response) {
 
            // window.location.reload();
         }
     });
 }