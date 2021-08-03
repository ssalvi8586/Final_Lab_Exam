import React from 'react';
import './App.css';
import {BrowserRouter as Router, Switch, Route} from "react-router-dom"
import Login from './subComponent/Login'
import AdminHome from './subComponent/AdminHome'
import EmployeeHome from './subComponent/EmployeeHome'

function App() {
  return (
    <div>
      <Router>
        <Switch>
          <Route exact path="/login">
              <Login/>
          </Route>
          <Route exact path="/admin">
              <AdminHome/>
          </Route>
          <Route exact path="/employee">
              <EmployeeHome/>
          </Route>
        </Switch>
      </Router>

    </div>
  );
}

export default App;

