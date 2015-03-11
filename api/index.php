<html>
    <head>
        <title>Azham Naphiel | 14000853</title>
        <link rel="stylesheet" type="text/css" href="index.css"/>

    </head>

    <body>
        <div class="wrapper">
            <h1>DSA REST api Guide </h1>
            <hr />

            <p>When making api calls, ensure that one of the following formats are followed.</p>
            <pre>               
            <table>
                <tr><td>Get all people:</td><td>/api/people/</td></tr>
                 <tr><td>Get all battles:</td><td>/api/battles/</td></tr>
                 <tr><td>Get specific people:</td><td>/api/people/&lt;name of person&gt;</td></tr>
                 <tr><td>Get specific battle:</td><td>/api/battles/&lt;name of battle&gt;</td></tr>
                 <tr><td>Get people involved in specific battle:</td><td>/api/battles/&lt;name of battle&gt;/people</td></tr>
            </table>
            *A format can be specified by adding `/xml` or `/json` to the end of the url.
             By default xml is assumed if a format is not specified.
            </pre>

        </div>
    </body>
</html>