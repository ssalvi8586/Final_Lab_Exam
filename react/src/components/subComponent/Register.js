import axios from 'axios';
import React, { useState } from 'react';



const Register = () => {
    const [categories, setCategories] = useState([]);

    const handleChange = (e)=>{
        // console.log(e.target.value);
        setCategories({name:e.target.value});
    }

    const onFormSubmit = async (e)=>{
        e.preventDefault();
        try {
            await axios.post(`http://127.0.0.1:8000/api/categories`,categories);
        } catch (error) {
            console.log(error);
        }
    }
    return (
        <>
            <h2>Register Employee</h2>
            <div className="mt-4">
                <input type="text" onChange={e=>handleChange(e)} className="form-control my-3" id="fname" placeholder="Name" />
                <input type="text" onChange={e=>handleChange(e)} className="form-control my-3" id="contact" placeholder="Contact" />
                <input type="text" onChange={e=>handleChange(e)} className="form-control my-3" id="uname" placeholder="Username" />
                <input type="password" onChange={e=>handleChange(e)} className="form-control my-3" id="pass" placeholder="Password" />
                <button type="button" onClick={e=>onFormSubmit(e)} className="my-3 btn btn-primary">Register</button>
            </div>

        </>
    );
}

export default Register;