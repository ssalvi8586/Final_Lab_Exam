import React, { useState } from 'react';
import { useHistory, useParams } from "react-router-dom";

const Login = () => {
    const [login, setLogin] = useState({
        uname: "",
        pass: ""
    });
    const state = { isSubmitted: false };
    const history = useHistory();


    const handleChange = (e) => {
        setLogin({ [e.target.name]: e.target.value });
    };

    const submitForm = () => {
        if(login.uname === "admin" && login.pass === 1234){
            history.push("/admin");
        }
    }

    return (
        <>
            <div className="container">
                <h2 className="text-center">Login</h2>
                <div className="row mt-4">
                    <div className="col-4"></div>
                    <div className="col-4">
                        <form>
                            <input type="text" onChange={e => handleChange(e)} className="form-control my-4" name="uname" id="uname" placeholder="Username" />
                            <input type="password" onChange={e => handleChange(e)} className="form-control my-4" name="pass" id="pass" placeholder="Password" />
                            <button type="button" onClick={submitForm} className="my-3 btn btn-primary">Login</button>
                        </form>

                    </div>
                    <div className="col-4"></div>
                </div>

            </div>

        </>
    );
}

export default Login;