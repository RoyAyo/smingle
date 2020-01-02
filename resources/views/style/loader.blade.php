<style>
#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 4;
  width: 100px;
  height: 100px;
  margin: -75px 0 0 -75px;
  border: 8px solid #f3f3f3;
  border-radius: 50%;
  border-top: 8px solid #3498db;
  opacity: 0.7;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}
#loader-div{
  position: fixed;
  z-index: 99999;
  width: 100vw;
  height: 100vh;
  top: 0;
  background-color: rgba(180,180,180,0.5);
  display: none;
}
@media(max-width: 700px){
  #loader {
      position: absolute;
      left: 55%;
    }
</style>