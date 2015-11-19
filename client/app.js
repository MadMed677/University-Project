import React                            from 'react';
import ReactDOM                         from 'react-dom';
import { Router, Route, Link }          from 'react-router';

import Main                             from './src/main/components/Main.js';

ReactDOM((
    <Router>
        <Route path="/" component={ Main }></Route>
    </Router>
), document.getElementById('root'));