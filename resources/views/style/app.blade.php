<style>
	/* Default properties for the website */
	*{
		box-sizing: border-box;
	}

	a{
		color: grey;
		text-decoration: none;
	}
	a:hover{
		text-decoration: none;
	}

	/* Properties for the layout page/template */
	
	/*header*/
	nav{
		position: fixed;
		top: 0px;
		width: 100%;
		height: 58px;
		z-index: 40;
	}
	#nav{ 
		padding: 0.6rem; 
		padding-left: 1.2rem; 
		display: flex;
		width: 100%;
		justify-content: space-between;
	}

	#nav-left{
		width: 70%;
	}

	#menu-toggle{
		position: relative;
		bottom: 3px;
	}

	#logo{
		margin-left: 0.6rem;
	}

	#nav-right{
		width: 30%;
		text-align: right;
		margin-right: 1rem;
		position: relative;
		top: 7px;
	}
	.nav-auth{
		margin-right: 1rem;
		font-size: 11pt;
		transition: all 0.2s ease-in; 
	}
	.nav-auth:hover{
		color: red;
		font-size: 11.4pt;
	}

	.nav-name{
		font-size: 11pt;
		text-decoration: none;
	}
	.nav-name:hover{
		color: black;
	}
	.nav-logout{
		color: black;
	}
	article{
		padding-top: 58px;
	}

	/*sidebar*/
	#wrapper {
	    padding-left: 0;
	    -webkit-transition: all 0.5s ease;
	    -moz-transition: all 0.5s ease;
	    -o-transition: all 0.5s ease;
	    transition: all 0.5s ease;
	}

	#wrapper.toggled {
    	padding-left: 250px;
	}

	#sidebar-wrapper {
	    z-index: 100;
	    position: fixed;
	    left: 250px;
	    width: 0;
	    height: 100%;
	    margin-left: -250px;
	    overflow-y: auto;
	    background: #fff;
	    -webkit-transition: all 0.5s ease;
	    -moz-transition: all 0.5s ease;
	    -o-transition: all 0.5s ease;
	    transition: all 0.5s ease;
	}

	#wrapper.toggled #sidebar-wrapper {
	    width: 250px;
	}

	#page-content-wrapper {
	    width: 100%;
	    position: absolute;
	    padding: 0px;
	}

	#wrapper.toggled #page-content-wrapper {
	    position: absolute;
	    margin-right: 250px;
	}

	/* Sidebar Styles */

	.sidebar-nav {
	    position: absolute;
	    top: 0;
	    width: 250px;
	    margin: 0;
	    padding: 0;
	    list-style: none;
	}

	.sidebar-nav li {
	    text-indent: 20px;
	    line-height: 40px;
	}

	.sidebar-nav li a {
	    display: block;
	    text-decoration: none;
	    color: #999999;
	}

	.sidebar-nav li a:hover {
	    text-decoration: none;
	    color: #000000;
	    background: rgba(255,255,255,0.2);
	}

	.sidebar-nav li a:active,
	.sidebar-nav li a:focus {
	    text-decoration: none;
	}

	img.sidebar-icon{
		width: 22px;
		height:22px;
		margin-right: 0.4rem;
		position: relative;
		bottom: 3px;
	}

	.sidebar-nav > .sidebar-brand {
	    height: 65px;
	    font-size: 18px;
	    line-height: 60px;
	}


	@media(min-width:768px) {
	    #wrapper {
	        padding-left: 250px;
	    }

	    #wrapper.toggled {
	        padding-left: 0;
	    }

	    #sidebar-wrapper {
	        width: 250px;
	    }

	    #wrapper.toggled #sidebar-wrapper {
	        width: 0;
	    }

	    #page-content-wrapper {
	        padding: 0px;
	        position: relative;
	    }

	    #wrapper.toggled #page-content-wrapper {
	        position: relative;
	        margin-right: 0;
	    }
	}

	/* media query for the homepage*/
	@media (max-width: 768px){
		#logo{
			margin-left: 0.1rem;
		}
		#nav{
			padding: 0.2rem 0.05rem;
		}
		#nav-left{
			width: 40%;
			position: relative;
			top: 5px;
		}
		#nav-right{
			width: 60%;
			top: 12px;		
		}
	}

	/*for profile page */
	.jumbo {
		width: 100%;
		height: 400px;
		border-radius: 3px;
		background-size: cover;
		background-repeat: no-repeat;
		background-position: center;
	}
	
	.details {
		display: flex;
		flex-direction: column;
		align-items: center;
	}
	.details .h3 {
		color: #212121;
		font-size: 28px;
		margin-top: 15px;
	}
	.details .p {
		color: #727272;
		margin-top: 0px;
	}
	
	.bio {
		margin-bottom: 80px;
	}
	.bio .title .h6 {
		color: #212121;
		font-size: 18px;
	}
	.bio .content .p {
		color: #727272;
	}

	.message-icon{
		width: 25px;
		height:25px;
		margin-right: 0.4rem;
		position: relative;
		bottom: 3px;
	}
	#message-user a{
		display: block;
		font-size: 12pt;
		margin-bottom: 0.2rem;
	}
	#message-user{
		margin-bottom: 0.5rem;
	}
	/* Messaging styles */
	.message-card{
		height: calc(100vh - 58px);
		
	}
	.messages{
		position: relative;
		width: 100%;
		height: calc(100vh - 58px);
		background-color: #E6EAEA;
		display: none;
	}
	.message-header{
		background-color: #fff;
		height: 50px;
		position: absolute;
		top: 0;
		z-index: 4;
		width: 100%;
		padding-left: 0.8rem;
		padding-top: 0.7rem;
	}
	.message-header span{
		font-size: 13pt;
		font-weight: bold;
		position: relative;
		top: 1.8px;
	}
	.message-body{
		position: absolute;
		padding-top: calc(100% - 50px);
		bottom: 0;
		width: 100%;
	}
	#chats{
		height: 100%;
		overflow-y: auto;
	}
	.message-body p{
		width: 100%;
	}
	.text{
		padding: 10px 20px;
		border-radius: 10px;
		line-height: 130%;
  		max-width: 450px;
		margin-bottom: 3px;	
	}
	.sent{
		color: #f5f5f5;
  		display: flex;		
  		justify-content: flex-end;
		margin-bottom: 5px;
	}
	.sent .text{
  		background: #435f7a;
	}
	.replies{
		display: flex;
		justify-content: flex-start;
		margin-bottom: 5px;
	}
	.replies .text{
  		background: #f5f5f5;
	}
	.message-input{
		width: 100%;
		height: 35px;
	}
	.message-input form{
		height: 100%;
	}
	.message-input input{
		font-family: "proxima-nova",  "Source Sans Pro", sans-serif;
		border: none;
		width: calc(100% - 35px);
		color: #32465a;
		height: 100%;
		border-top-left-radius: 5px;
		border-bottom-left-radius: 5px;
		padding: 1rem;
	}
	.message-input input:hover{
		outline: none;
	}

	#send-message-btn{
		width: 35px;
		height: 100%;
		background-color: #fff;
	}

	#send-message-btn img{
		height: 20px;
		width: 20px;
	}

	#default-m{
		position: relative;
		top: calc(((100vh - 58px) / 2) - 15px);
		text-align: center;
		font-size: 18pt;
	}


	/*media query for profile pahe*/
@media screen and (max-width: 600px) {
	
	.jumbo {
		height: 350px !important;
	}
}

/* for the events page*/
	.event-date{
		color: rgba(200,200,200,0.8);
	}

	.event h4{
		font-weight: bolder;
		font-size: 14pt;
	}
	.event-avatar img{
		width: 300px;
		height: 300px;
		border-radius: 3px;
		cursor: pointer;
	}
	.event-name a{
		text-decoration: none;
		color: grey;
		transition: color .2s ease-in; 
	}
	.event-name a:hover{
		color: rgba(220,0,0,0.5);
	}

	.verify:hover,.event_match:hover,.attend_event:hover{
		background-color: blue;
	}
	.event-going:after{
		clear: both;
	}

	#studentship{
		display: none;
	}
	#matched-div{
		position: fixed;
		z-index: 9999999;
		width: 100vw;
		height: 100vh;
		top: 0;
		display: none;
	}
	.match-imgs{
		display: flex;
		justify-content:space-around;
		margin-bottom: 40px;
	}
	.match-imgs .imdiv{
		display: flex;
		flex-direction: column;
	}
	.match-imgs .imdiv div{
		margin-bottom: 0.25rem;
	}
	.match-imgs img{
		height: 300px;
		width: 300px;
		border-radius: 50%;
	}
	.match-imgs .arrow{
		position: relative;
		top: 130px;
		font-size: 30pt;
		font-weight: bold;
	}

	#agematch{
		text-align: center;
		font-size: 10.5pt;
		color: grey;
		position: relative;
		bottom: 4px;

	}

	.namematch{
		text-align: center;
		font-size: 14pt;
		font-weight: bold;
	}

	#matchscore{
		text-align: center;
		font-size: 30pt;
		font-weight: bold;
	}

	#matchdivfooter{
		display: flex;
		justify-content: space-around;
		padding: 0.5rem 4rem;
		flex-wrap: wrap;
	}

	@media(max-width: 768px){
		.event-avatar img{	
			width: 250px;
			height: 250px;
		}
		.match-imgs img{
			height: 150px;
			width: 150px;
			border-radius: 50%;
		}
		.match-imgs .arrow{
			top: 60px;
			font-size: 20pt;
		}
		.match-imgs{
			margin-bottom: 70px;
		}
		#matchdivfooter{
			padding: 0.5rem 1rem;
		}
	}
	@media(max-width: 420px){
		.match-imgs{
			margin-top: 40px;
			margin-bottom: 80px;
		}
		.match-imgs img{
			height: 120px;
			width: 120px;
			border-radius: 50%;
		}
		.match-imgs .arrow{
			top: 50px;
			font-size: 12pt;
		}
	}
	@media(max-width: 990px){
		.useless-chat{
			display: none;
		}
	}

	#closematchdiv{
		position: relative;
		top: 5px;
	}
	#not-time{
		float: right;
	}
	#not-time:after{
		clear: both;
	}
	.prof-filters{
		font-weight: bold;
	}


</style>