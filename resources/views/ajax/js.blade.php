<script>
    $('document').ready(() =>{
        const token = $('meta[name="csrf-token"]').attr('content');

        $('#user-sub').on('click',(e) => {
            e.preventDefault();
            $('#loader-div').show();
            const username = $('#check-user-match').val();
            const using = $('#comp-with').val();

            $.post("{{ route('comp.check') }}",{
               '_token' : token,
               'username' : username,
               'using' : using
            },(res) => {
                const result = res;

                if (typeof result == 'string') {
                    $('#match-perc').html(res);
                    $('#loader-div').hide();
                    return;
                }
                $('.matched-title').html('!!!');
                
                $('#twm').hide();
                $('#igm').hide();

                $('#loader-div').hide();


                $('#namematch').html(result.name);

                $('#matchscore').html(result.score);

                $('#matchedsmprofile').attr('href','user/'+result.username);

                //$('#agematch').html(res.age);

                $('#matched-div').show();

            });
        });

        $('#find-match-btn').on('click',(e) => {
            e.preventDefault();
            $('#loader-div').show();
            const based_on = $('#filter_based_on').val();  
            const age = $('#filter_age').val();
            const location = $('#filter_location').val();
            const religion = $('#filter_religion').val();
            const height = $('#filter_height').val();
            const r_status = $('#filter_r_status').val();
            const m_status = $('#filter_m_status').val();
            const need = $('#filter_need').val();
            const student = $('#filter_student').val();
            const school = $('#filter_school').val();
            const course = $('#filter_course').val();
            const level = $('#filter_level').val();
            const job = $('#filter_job').val();
            const body_shape = $('#filter_body_shape').val();
            const skin_colour = $('#filter_skin_colour').val();
            const model = $('#filter_model').val();

            $.post("{{ route('match.check') }}",{
               '_token' : token,
               'based_on' : based_on,
               'age' : age,
               'location' : location,
               'religion' : religion,
               'height' : height,
               'r_status' : r_status,
               'm_status' : m_status,
               'need' : need,
               'student' : student,
               'school' : school,
               'course' : course,
               'level' : level,
               'job' : job,
               'body_shape':body_shape,
               'skin_colour':skin_colour,
               'model':model
            },(res) => {
                const result = res;

                if (typeof result == 'string') {
                    toastr.error(result);
                    $('#loader-div').hide();
                    return;
                }
                $('#loader-div').hide();

                $('#namematch').html(result.name);

                $('#matchscore').html(result.score);

                $('#matchedsmprofile').attr('href','user/'+result.username);

                $('#matchedtwprofile').attr('href','https://twitter.com/'+result.twitter);
                
                $('#matchedigprofile').attr('href','https://www.instagram.com/'+result.instagram);

                //$('#agematch').html(res.age);

                $('#matched-div').show();

            });
        });
    

        $("#menu-toggle").on('click',(e) => {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
        });
        

        $('.verify').on('click',function() {
            const id = $(this).attr('ide');
            var v = $(this).attr('verified');
            if (v == "0") {
                v = 1;
                $(this).attr('verified','1');
                $(this).html('Unverify');
            }else{
                v = 0;
                $(this).attr('verified','0');
                $(this).html('Verify');
            }

            $.post('admin/verify/'+id,{
                '_token' : token,
                'v' : v
            },(res)=>{
             if (res == '1') {
                $('.event_going_'+id).attr('attending',res);
                $('.event_going_'+id).html('Users Going: '+res);
             }else{
                $('.event_going_'+id).attr('attending',res);
                $('.event_going_'+id).html('Users Going: '+res);
             }
            });
        });


        $('.attend_event').on('click',function(){
            const id = $(this).attr('ide');
            var a = $(this).attr('attend');
            if (a == "0") {
                a = 1;
                $(this).attr('attend','1');
                $(this).html('Unattend');
            }else{
                a = 0;
                $(this).attr('attend','0');
                $(this).html('Attend');
            }
            alert(a)
            $.post('attend/'+id,{
                '_token' : token,
                'a' : a
            },(res) => {
                $('.event_going_'+id).attr('attending',res);
                $('.event_going_'+id).html('Users Going: '+res);
            });

        });
        

        // //pusher for my messages
            // Pusher.logToConsole = true;

            // var pusher = new Pusher('0af97750b30e5e72df02', {
            //     cluster: 'eu',
            //     forceTLS: true
            // });

            // var channel = pusher.subscribe('my-channel');
            // channel.bind('my-event', function(data) {
            //     $('#chat-message').val("");
            //     if (data.message.sender_id == {{auth()->user()->id}}) {
            //         $('<p class="sent"><span class="text">' + data.message.message + '</span></p>').appendTo('#chats');                 
            //     }else{
            //         $('<p class="replies"><span class="text">' + data.message.message + '</span></p>').appendTo('#chats');
            //     }
            // });
        
        $('#send-message-btn').on('click', (e) => {
            e.preventDefault();
            const message = $('#chat-message').val();
            const other_id = $('#otherid').val();

            $.post('message/'+other_id,{
                '_token':token,
                'message':message
            });
        });

        $('#filter_student').on('change',function() {
            const s = $(this).val();
            if (s == 1) {
                $('#studentship').fadeIn(200);
            }else{
                $('#studentship').fadeOut(200);
            }
        });

        $('#user-search').on('click',(e) => {
            e.preventDefault();

            const username = $('#search-user').val();


            $.post('searchuser',{
                '_token': token,
                'username':username
            },(res) => {
                const result = JSON.parse(res);
                $('#search-info').empty();
                
                result.forEach(r => {
                    var c = $('<div class="card" style="margin-bottom:0.3rem;"></div>');
                    c.appendTo('#search-info');
                    $('<p class="serached-user-avatar"></p>').appendTo(c);
                    $('<h4><a href="#">'+ r.name +'</a></h4>').appendTo(c);
                    $('<h5>'+ r.username +'</h5>').appendTo(c);
                });
            });
        });

        $('#closematchdiv').on('click',() => {
            $('#matched-div').fadeOut(500)
        });
    });

</script>