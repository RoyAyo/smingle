<style>
	.card{
		height: calc(100vh - 58px);
	}
	.messages{
		position: relative;
		width: 100%;
		height: calc(100vh - 58px);
		background-color: #E6EAEA;
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

</style>