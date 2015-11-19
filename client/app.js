import React                            from 'react';
import ReactDOM                         from 'react-dom';
import { Router, Route, Link }          from 'react-router';

import Main                             from './src/main/components/Main.js';
import Demo                             from './src/main/components/Demo.js'

ReactDOM.render((
    <Router>
        <Route path="/" component={Main}>
            <Route path="demo" component={Demo}/>
        </Route>
    </Router>
), document.getElementById('root'));