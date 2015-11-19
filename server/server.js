'use strict';

import express                      from 'express';

let app                             = express();

app.get('*', (req, res) => {
    res.send('ok');
});

app.listen(4000);
