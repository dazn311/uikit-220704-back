navigator.serviceWorker.register('sw.js').then(r => console.log(r));

navigator.serviceWorker.ready.then(async function (registration) {
    console.log('registration');
    const publicKey = "BAfNaGRIukwj_jcTkw8ymqJiWg9QOZ5wKt3famaKgNz_K5g583NVDD6y1FVKUv00iaaCiNkr4VZ4OE3ecmDz9ro";
    const subscription = await registration.pushManager.subscribe({
            userVisibleOnly:true,
            applicationServerKey: publicKey
            // applicationServerKey: urlBase64ToUint8Array(publicKey)
        }
    )
    // delete subscription['expirationTime'];
    // serviceWorkerRegistration.pushManager.subscribe({
    //     userVisibleOnly: true,
    //     applicationServerKey: urlBase64ToUint8Array(vapidPublicKey)
    // })
    console.log('11 subscription:',subscription);
    // console.log('11 subscription:', {
    //     endpoint: subscription['endpoint'],
    //     keys: subscription['options']['applicationServerKey']
    //     // keys: subscription['keys'],
    // });
    // const formData = new FormData();
    // formData.append("endpoint", subscription.endpoint);
    // formData.append("expirationTime", String(subscription.expirationTime));
    // formData.append("keys", subscription.keys);
    fetch('http://localhost:8085/api/subscription', {
        method:'POST',
        body: JSON.stringify(subscription),
        // body: JSON.stringify({
        //     endpoint: subscription['endpoint'],
        //     keys: subscription['options']['applicationServerKey']
        //     // keys: subscription['keys'],
        // }),
        headers: {
            "Content-Type":"application/json"
        }
    })
    .then(res => {
        return  res.json();

    })
    .then(r => {
        console.log('response subscription',r);
    })


});
function urlBase64ToUint8Array(base64String) {
    const padding = '='.repeat((4 - base64String.length % 4) % 4);
    const base64 = (base64String + padding)
        .replace(/\-/g, '+')
        .replace(/_/g, '/');

    const rawData = window.atob(base64);
    const outputArray = new Uint8Array(rawData.length);

    for (var i = 0; i < rawData.length; ++i) {
        outputArray[i] = rawData.charCodeAt(i);
    }
    return outputArray;
}

function enableNotification() {
    console.log('start enableNotification.',Notification);
    Notification.requestPermission()
        .then((permission) => {

            if (permission === 'granted') {
                navigator.serviceWorker.ready.then((sw) => {
                        console.log('77 enableNotification. serviceWorkerRegistration',sw);
                        sw.pushManager.subscribe({
                            userVisibleOnly: true,
                            applicationServerKey: "BAfNaGRIukwj_jcTkw8ymqJiWg9QOZ5wKt3famaKgNz_K5g583NVDD6y1FVKUv00iaaCiNkr4VZ4OE3ecmDz9ro"
                        })
                            .then((subscription) => {
                                console.log('enableNotification is: ', JSON.stringify(subscription));
                            })
                    })
                    .catch(er => {
                        console.log(er);
                    })
            }
        })
}
// enableNotification();