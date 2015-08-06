


			var scene = new THREE.Scene();
			var camera = new THREE.PerspectiveCamera( 75, window.innerWidth/window.innerHeight, 0.1, 1000 );
		
			var renderer = new THREE.WebGLRenderer();
			renderer.setSize( window.innerWidth, window.innerHeight );
			document.body.appendChild( renderer.domElement );
			
			var objects=[];
			projector = new THREE.Projector();
                        
                        
                        // creat obejects 
                        
                        var boxD = .5;
			
                        // obj1

			var geometry = new THREE.BoxGeometry (boxD , boxD, boxD );
			var material = new THREE.MeshBasicMaterial( { color: 0xff0000 } );
			var cube1 = new THREE.Mesh( geometry, material );
			// cube.userData = {URL: "http://google.com" };
                        cube1.dataNavid = "objects/cube1.txt";
                        // cube1.rotation.y = 0;
                        cube1.position.x = 2;
			scene.add( cube1 );
                        
                        
                        // obj2

			var geometry = new THREE.BoxGeometry( boxD, boxD, boxD );
			var material = new THREE.MeshBasicMaterial( { color: 0x0000ff } );
			var cube2 = new THREE.Mesh( geometry, material );
			// cube.userData = {URL: "http://google.com" };
                        cube2.dataNavid = "objects/cube2.txt";
                        // cube2.rotation.y = 0;
                        cube2.position.z = 2;
			scene.add( cube2 );
                        
                        
                        
                        // obj3

			var geometry = new THREE.BoxGeometry( boxD, boxD, boxD );
			var material = new THREE.MeshBasicMaterial( { color: 0x00ff00 } );
			var cube3 = new THREE.Mesh( geometry, material );
			// cube.userData = {URL: "http://google.com" };
                        cube3.dataNavid = "objects/cube3.txt";
                        // cube3.rotation.y = 0;
                        cube3.position.x = -2;
			scene.add( cube3 );
                        
                        
                        // obj4

			var geometry = new THREE.BoxGeometry( boxD, boxD, boxD );
			var material = new THREE.MeshBasicMaterial( { color: 0xcccccc } );
			var cube4 = new THREE.Mesh( geometry, material );
			// cube.userData = {URL: "http://google.com" };
                        cube4.dataNavid = "objects/cube4.txt";
                        // cube4.rotation.y = 0;
                        cube4.position.z = -2;
			scene.add( cube4 );
                        
             
                 
                        objects.push(cube1);
                        objects.push(cube2);
                        objects.push(cube3);
                        objects.push(cube4);
                        
                        
                     
                        // floor
                        
                        var geometry = new THREE.BoxGeometry(100,.1,100);
                        var material = new THREE.MeshBasicMaterial({color:0x202020});
                        var floor = new THREE.Mesh(geometry,material);
                        floor.position.z=0;
                        scene.add(floor);
                        
                      
                  
                        
                        
                        // camera 
                        
                     
                                camera.position.y = 10;
                 
                       
                       
                       

			
			controls = new THREE.OrbitControls( camera, renderer.domElement );

			var render = function () {
                                
				requestAnimationFrame( render );
                                
                            
                            
    				renderer.render(scene, camera);
                         
			};
			
			//------- -- selector -----
			
			document.addEventListener('mousedown', onDocumentMouseDown, false);
				
				function onDocumentMouseDown(event) {
					event.preventDefault();
					var vector = new THREE.Vector3((event.clientX / window.innerWidth) * 2 - 1, -(event.clientY / window.innerHeight) * 2 + 1, 0.5);
					projector.unprojectVector(vector, camera);
					var raycaster = new THREE.Raycaster(camera.position, vector.sub(camera.position).normalize());
					var intersects = raycaster.intersectObjects(objects);
					if (intersects.length > 0) {
					
				        //window.open(intersects[0].object.userData.URL);

							$(document).ready(function(){
							     $("#div1").load( intersects[0].object.dataNavid);
							});
						
						}
					}
			
			
			
			//-----------  ^ selector ^ -------
           render();
