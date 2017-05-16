
importScripts('https://www.gstatic.com/firebasejs/3.5.2/firebase-app.js');
importScripts('https://www.gstatic.com/firebasejs/3.5.2/firebase-messaging.js');
//importScripts('core/decoder.js');

  // var config = {
  //   apiKey: "AIzaSyDztbVSezyNNukaBk8pcpjXYu3ocujguHs",
  //   authDomain: "web-push-af633.firebaseapp.com",
  //   databaseURL: "https://web-push-af633.firebaseio.com",
  //   storageBucket: "web-push-af633.appspot.com",
  //   messagingSenderId: "1070084077565",
  // };
  // firebase.initializeApp(config);

  firebase.initializeApp({
    'messagingSenderId': '1070084077565'
  });


  const messaging = firebase.messaging();

  messaging.setBackgroundMessageHandler(function(payload) {
    console.log('[firebase-messaging-sw.js] Received background message ', payload);
    // Customize notification here
    const notificationTitle = 'Background Message Title';
    const notificationOptions = {
      body: 'Background Message body.',
      icon: '/firebase-logo.png'
    };

    return self.registration.showNotification(notificationTitle,
        notificationOptions);
  });


//   messaging.setBackgroundMessageHandler(function(payload) {
//   var shinyData = payload || {};
//   console.log('[firebase-messaging-sw.js] Received background message ', payload, shinyData);    
//   //console.log('[firebase-messaging-sw.js] Received background message ', payload);
//   // Customize notification here
//   const notificationTitle = 'Background Message Title';
//   const notificationOptions = {
//     body: 'Background Message body.',
//     icon: 'firebase-logo.png'
//   };

//   return self.registration.showNotification(notificationTitle,
//       notificationOptions);
// });




// self.addEventListener('push', function(event) {  
//   // Since there is no payload data with the first version  
//   // of push messages, we'll grab some data from  
//   // an API and use it to populate a notification  
//   event.waitUntil(  
//     fetch(messaging).then(function(response) {  
//       if (response.status !== 200) {  
//         // Either show a message to the user explaining the error  
//         // or enter a generic message and handle the
//         // onnotificationclick event to direct the user to a web page  
//         console.log('Looks like there was a problem. Status Code: ' + response.status);  
//         throw new Error();  
//       }

//       // Examine the text in the response  
//       return response.json().then(function(data) {  
//         if (data.error || !data.notification) {  
//           console.error('The API returned an error.', data.error);  
//           throw new Error();  
//         }

//         var title = data.notification.title;  
//         var message = data.notification.message;  
//         var icon = data.notification.icon;  
//         var notificationTag = data.notification.tag;

//         return self.registration.showNotification(title, {  
//           body: message,  
//           icon: icon,  
//           tag: notificationTag  
//         });  
//       });  
//     }).catch(function(err) {  
//       console.error('Unable to retrieve data', err);

//       var title = 'An error occurred';
//       var message = 'We were unable to get the information for this push message';  
//       var icon = 'firebase-logo.png';  
//       var notificationTag = 'notification-error';  
//       return self.registration.showNotification(title, {  
//           body: message,  
//           icon: icon,  
//           tag: notificationTag  
//         });  
//     })  
//   );  
// });






      // self.addEventListener('push', function(event) {
      //     // console.log('Push message::', event);
      //     // var title = 'test123';
      //     // event.waitUntil(
      //     //   self.registration.showNotification(title, {
      //     //     body: 'this is test',
      //     //     icon: 'firebase-logo.png',
      //     //     tag: 'my-tag'
      //     //   }));

      //         messaging.setBackgroundMessageHandler(function(payload) {
      //         var shinyData = payload || {};
      //         console.log('[firebase-messaging-sw.js] Received background message ', payload, shinyData);    
      //         //console.log('[firebase-messaging-sw.js] Received background message ', payload);
      //         // Customize notification here
      //         const notificationTitle = 'Background Message Title';
      //         const notificationOptions = {
      //           body: 'Background Message body.',
      //           icon: 'firebase-logo.png'
      //         };

      //         return self.registration.showNotification(notificationTitle,
      //             notificationOptions);
      //       });          
      //   });   




//   console.log('Started', self);
// self.addEventListener('install', function(event) {
//   self.skipWaiting();
//   console.log('Installed', event);
// });
// self.addEventListener('activate', function(event) {
//   console.log('Activated', event);
// });


// self.addEventListener('notificationclick', function(event) {
//     console.log('Notification click: tag ', event.notification.tag);
//     event.notification.close();
//     var url = 'https://www.youbaby.com.tw';
//     event.waitUntil(
//         clients.matchAll({
//             type: 'window'
//         })
//         .then(function(windowClients) {
//             for (var i = 0; i < windowClients.length; i++) {
//                 var client = windowClients[i];
//                 if (client.url === url && 'focus' in client) {
//                     return client.focus();
//                 }
//             }
//             if (clients.openWindow) {
//                 return clients.openWindow(url);
//             }
//         })
//     );
// });