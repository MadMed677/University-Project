'use strict';

import express                      from 'express';

const app                           = express();
const port                          = 4000;

app.use( express.static('public') );

app.get('*', (req, res) => {
    res.sendfile('./public/index.html');
});

app.listen(port, () => console.log(`Listening on ${port} port`));
