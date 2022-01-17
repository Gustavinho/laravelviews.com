<!DOCTYPE html>
<html>
<head>
  <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <meta charset="UTF-8">
  <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/docsify/lib/themes/vue.css" />
</head>
<body>
  <nav>
    <a href="{{ route('page') }}">Docs</a>
    <a href="{{ route('page') }}">Live examples</a>
    <a href="{{ route('page') }}">Github</a>
  </nav>
  <div id="app"></div>
  <script>
    window.$docsify = {
      //...
      // logo: 'error.png',
      name: '<span>Laravel Views</span>',
      loadNavbar: true,
      coverpage: true,
      themeColor: '#8b5cf6',
      search : [
        '/',
      ],

      // complete configuration parameters
      search: {
        maxAge: 86400000, // Expiration time, the default one day
        paths: [], // or 'auto'
        placeholder: 'Type to search',

        // Localization
        placeholder: {
          '/zh-cn/': '搜索',
          '/': 'Type to search'
        },

        noData: 'No Results!',

        // Localization
        noData: {
          '/zh-cn/': '找不到结果',
          '/': 'No Results'
        },

        // Headline depth, 1 - 6
        depth: 2,

        hideOtherSidebarContent: false, // whether or not to hide other sidebar content

        // To avoid search index collision
        // between multiple websites under the same domain
        namespace: 'website-1',

        // Use different indexes for path prefixes (namespaces).
        // NOTE: Only works in 'auto' mode.
        //
        // When initialiazing an index, we look for the first path from the sidebar.
        // If it matches the prefix from the list, we switch to the corresponding index.
        pathNamespaces: ['/zh-cn', '/ru-ru', '/ru-ru/v1'],

        // You can provide a regexp to match prefixes. In this case,
        // the matching substring will be used to identify the index
        pathNamespaces: /^(\/(zh-cn|ru-ru))?(\/(v1|v2))?/
      }
    }
  </script>
  <script src="//unpkg.com/docsify/lib/docsify.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/prismjs@1/components/prism-bash.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/prismjs@1/components/prism-php.min.js"></script>
  <script src="//cdn.jsdelivr.net/npm/docsify/lib/plugins/search.min.js"></script>
</body>
</html>