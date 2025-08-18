self.addEventListener('push',  (event) => {
    const res = event.data.json();
    const options = {
        body: res.body ?? "Buzzi !!",
        icon: res.icon ?? "https://png.pngtree.com/png-clipart/20240109/original/pngtree-smile-icon-smile-sign-happy-emoticon-png-image_14055400.png",
        vibrate: [200,100,200,100],
        tag:"vibration3",
        data: {
            notifURL: res.url ?? '',
        },

    }
    const title = res.title ?? 'Push notification!';
    // Показываем уведомление с заголовком и телом сообщения.
    let promise = self.registration.showNotification(title, options);

    // console.log('5 res: ',res);
    event.waitUntil(promise);
});

self.addEventListener('notificationclick', (event) => {
    event.waitUntil(clients?.openWindow(event.notification.data.notifURL));
});

