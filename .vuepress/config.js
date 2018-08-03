module.exports = {
    dest: "public",
    serviceWorker: true,
    ga: 'UA-99756081-2',
    head: [
        ['link', { rel: 'icon', href: '/logo.svg' }]
    ],
    locales: {
        '/': {
            lang: 'en-EN',
            title: 'FondBot',
            description: 'PHP framework that helps build scalable and cross-platform chatbots',
        },
    },
    themeConfig: {
        repo: 'fondbot/fondbot.io',
        editLinks: true,
        lastUpdated: true,
        displayAllHeaders: true,
        sidebarDepth: 0,
        sidebar: [
            {
                title: 'Getting Started',
                collapsable: false,
                children: [
                    '/guide/',
                    '/guide/installation',
                    '/guide/configuration',
                ],
            },
            {
                title: 'Core Concepts',
                collapsable: false,
                children: [
                    '/guide/intents',
                    '/guide/interactions',
                    '/guide/sending-messages',
                    '/guide/templates',
                ],
            },
            {
                title: 'Drivers',
                collapsable: false,
                children: [
                    '/guide/drivers/telegram',
                ],
            },
        ],
    },
};