import axios from 'axios';
import React, { useState } from 'react';

const AddCategory = () => {
    const [categories, setCategories] = useState([]);
    const [status, setStatus] = useState();

    const handleChange = (e)=>{
        // console.log(e.target.value);
        setCategories({name:e.target.value});
    }

    const onFormSubmit = async (e)=>{
        e.preventDefault();
        try {
            await axios.post(`http://127.0.0.1:8000/api/categories`,categories);
            setStatus(true);
        } catch (error) {
            console.log(error);
        }
    }
    // if (status) {
    //     return <Home />
    //    }
    return (
        <>
            <h2>Add Category</h2>
            <div className="mt-4">
                <input type="text" onChange={e=>handleChange(e)} className="form-control" id="name" placeholder="Write a Category" />
                <button type="button" onClick={e=>onFormSubmit(e)} className="my-3 btn btn-primary">Add</button>
            </div>

        </>
    );
}

export default AddCategory;