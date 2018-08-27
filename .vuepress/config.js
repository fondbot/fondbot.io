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
                        link: '/guide/v3/',
                    },
                    {
                        text: 'Slack',
                        link: 'https://slack.fondbot.io'
                    },
                ],
            }
        },
        sidebar: {
            '/guide/v3/': require('./v3'),
        },
    },
};