<style >
	.q{
	font-family:Helvetica,Arial,sans-serif;
	box-sizing:border-box;
	background-color:#F6F6F6;
	width:70vw;
	border:none;
	margin: 0 auto;
	overflow:hidden;
	margin-bottom: 0.5rem;
	padding: 0.1rem 1rem;
}
.q p{
		box-sizing:border-box;
		width:100%;
		padding: 0rem;
		margin-bottom: 0.2rem;
		background-color:#F6F6F6;
		font-size:14pt;
		font-weight: bold;
}
input[type="radio"] + label{
		box-sizing:border-box;
		float:left;
		display:block;
		width:50%;
		font-size: 15pt;
		cursor: pointer;
}
label span{
	-webkit-box-shadow: 0px 0px 20px 0px rgba(50, 50, 50, 0.30);
	-moz-box-shadow:    0px 0px 20px 0px rgba(50, 50, 50, 0.30);
	box-shadow:         0px 0px 20px 0px rgba(50, 50, 50, 0.30);
	border-radius: 5px;
	display:block;
	width:80%;
	padding:15px;
	margin: 0 auto;
	background-color:#FFF;
	margin-bottom:10px;
	font-family:new-cursive;
	font-size: 11pt
}
label span:hover{
		background-color:#DCEEFA;
		color:#000;
	}
input[type="radio"]:checked + label span{
		background-color:#249DD4;
		color:#FFF;
}
	input[type="radio"]{
		position:absolute;
		left:-9999px;
	}
@media(max-width: 900px){
.q{
	width: 100%;
}
.q legend{
	font-size: 14pt;
}
input[type="radio"] + label{
	width: 100%;
	margin: 0 auto;
}
label span{
	width: 80%;
	color: black;
}

</style>