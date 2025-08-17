self.addEventListener('push',  (event) => {
    // console.log('2 event.data: ',event.data.json());
    const res = event.data.json();
    // console.log('2 event.data: ',title,body,url);
    console.log('5 res: ',res);
    event.waitUntil(
        // Показываем уведомление с заголовком и телом сообщения.
        self.registration.showNotification(res.title ?? '', {
            body: res.body ?? '',
            // icon: '/static/images/icon.png',
            data: {
                notifURL: res.url ?? '',
            },
            tag:'v1'
        })
    );
});

self.addEventListener('notificationclick', (event) => {
    // console.log('19 clients: ',clients);
    event.waitUntil(clients?.openWindow(event.notification.data.notifURL));
});
// const st = {"title":"Hi,Sanya","body":"how a you? ","url":"https://homesstaging.ru"};
