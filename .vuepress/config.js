module.exports = {
    dest: "public",
    ga: 'UA-99756081-2',
    head: [
        ['link', {rel: 'icon', href: '/logo.svg'}]
    ],
    locales: {
        '/': {
            lang: 'en-EN',
            title: 'FondBot',
            description: 'PHP framework that helps build scalable and cross-platform chatbots',
        },
    },
    themeConfig: {
        repo: 'fondbot/fondbot',
        docsRepo: 'fondbot/fondbot.io',
        editLinks: true,
        lastUpdated: true,
        displayAllHeaders: false,
        sidebarDepth: 1,
        locales: {
            '/': {
                nav: [
                    {
                        text: 'Guide',
                        link: '/guide/',
                    },
                    {
                        text: 'Slack',
                        link: 'https://slack.fondbot.io'
                    },
                ],
            }
        },
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
                    '/guide/drivers/',
                    '/guide/drivers/telegram',
                    '/guide/drivers/vk',
                ],
            },
        ],
    },
};