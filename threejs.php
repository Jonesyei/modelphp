<!DOCTYPE>
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<title>test</title>
<script type="text/javascript" src="includes/js/jquery.js"></script>
<script type="text/javascript" src="includes/js/three3D/three_r71.js"></script>
<script type="text/javascript" src="includes/js/three3D/OrbitControls.js"></script>
<script type="text/javascript">

var renderer;//声明全局变量（对象）
var _obj_canvas;
function initThree(obj) {
	_obj_canvas = document.getElementById(obj);
	renderer=new THREE.WebGLRenderer({antialias:true});//生成渲染器对象（属性：抗锯齿效果为设置有效）
	renderer.setSize(_obj_canvas.clientWidth, _obj_canvas.clientHeight );//指定渲染器的高宽（和画布框大小一致）
	_obj_canvas.appendChild(renderer.domElement);
	//renderer.setClearColor(0xFFFFFF, 1.0);//设置canvas背景色(clearColor)
}
			  
			  
//设置场景
var scene;
function initScene() {   
	scene = new THREE.Scene();
}
			  
//设置相机
var camera;
function initCamera() { 
//设置透视投影的相机,默认情况下相机的上方向为Y轴，右方向为X轴，沿着Z轴朝里（视野角：fov 纵横比：aspect 相机离视体积最近的距离：near 相机离视体积最远的距离：far）
		camera = new THREE.PerspectiveCamera( 45, _obj_canvas.clientWidth / _obj_canvas.clientHeight , 1 , 5000 );
		camera.position.x = 0;//设置相机的位置坐标
		camera.position.y = 342;//设置相机的位置坐标
		camera.position.z = 1368;//设置相机的位置坐标
		camera.up.x = 0;//设置相机的上为「x」轴方向
		camera.up.y = 1;//设置相机的上为「y」轴方向
		camera.up.z = 0;//设置相机的上为「z」轴方向
		camera.lookAt( {x:0, y:0, z:0 } );//设置视野的中心坐标
}

var controls;
function initCameraControl(){
	var radius = sphere.geometry.boundingSphere.radius;
	controls = new THREE.OrbitControls( camera );
	//controls.target = new THREE.Vector3( 0, radius, 0 );
	controls.target = new THREE.Vector3( 0, 0, 0 );
	controls.update();
}

//设置光源
var light;
function initLight() { 
	light = new THREE.DirectionalLight(0xff0000, 1.0, 0);//设置平行光源
	light.position.set( 200, 200, 200 );//设置光源向量
	scene.add(light);// 追加光源到场景
}

//设置物体
function initObject(x,y,z){  
	obj = new THREE.Mesh(
		 new THREE.SphereGeometry(20,20),                //width,height,depth
		 new THREE.MeshLambertMaterial({color: 0xff0000}) //材质设定
	);
	scene.add(obj);
	obj.position.set(0,0,-3);
	return obj;
}

//-資料物件
var animation;
function initObjectJson(data){
	var loader = new THREE.JSONLoader( true );
	loader.load( data, function( geometry ) {

		mesh = new THREE.Mesh( geometry, new THREE.MeshLambertMaterial( { color: 0x606060, morphTargets: true } ) );
		mesh.scale.set( 1.5, 1.5, 1.5 );
		scene.add( mesh );

		animation = new THREE.MorphAnimation( mesh );
		animation.play();

	} );
}


//-播放運行
var prevTime = Date.now();
function initplay(){
		renderer.render(scene, camera);
		requestAnimationFrame( initplay );
		
		//--
		if ( animation ) {
					var time = Date.now();
					animation.update( time - prevTime );
					prevTime = time;
		}

}

//执行
var sphere
function threeStart(obj) {
	initThree(obj);
	initCamera();
	initScene();   
	initLight();
	
	sphere = initObject(); //-一般模型
	initObjectJson("includes/js/three3D/horse.js"); //-格式模型
	
	initCameraControl();
	renderer.clear(); 
	initplay();
}
        </script>
        <style type="text/css">
            div#canvas3d{
                  width: 1400px;
                  height: 600px;
                  background-color: #EEEEEE;
                }
        </style>
    </head>

<body onload="threeStart('canvas3d');">
    <!--盛放canvas的容器-->
    <div id="canvas3d"></div>
</body>

</html>