import React from 'react';
import { BrowserRouter, Route, Switch, Redirect } from 'react-router-dom';


import Login from './pages/auth/login';
import Register from './pages/auth/register';
import Reset from './pages/auth/reset';

const Routes = () => (
    <BrowserRouter>
        <Switch>
            <Route exact path="/login" component={Login} />
            <Route exact path="/register" component={Register} />
            <Route exact path="/reset" component={Reset} />
        </Switch>
    </BrowserRouter>
);

export default Routes;
