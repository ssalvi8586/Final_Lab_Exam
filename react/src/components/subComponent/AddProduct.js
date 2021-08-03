import axios from 'axios';
import React, { useState } from 'react';



const AddProduct = () => {
    const [product, setProduct] = useState({
        pname:"",
        quantity:"",
        price:""

    });

    const handleChange = (e)=>{
        console.log(e.target.value);
        setProduct({
            ...product,
            [e.target.name]:e.target.value
        });
    }

    const onFormSubmit = async (e)=>{
        e.preventDefault();
        try {
            await axios.post(`http://127.0.0.1:8000/api/product`,product);
        } catch (error) {
            console.log(error);
        }
    }
    return (
        <>
            <h2>Add Product</h2>
            <div className="mt-4">
                <input type="text" onChange={e=>handleChange(e)} className="form-control my-3" name="pname" id="pname" placeholder="Name" />
                <input type="text" onChange={e=>handleChange(e)} className="form-control my-3" name="quantity" id="quantity" placeholder="Quantity" />
                <input type="text" onChange={e=>handleChange(e)} className="form-control my-3" name="price" id="price" placeholder="Price" />
                <button type="button" onClick={e=>onFormSubmit(e)} className="my-3 btn btn-primary">Add</button>
            </div>

        </>
    );
}

export default AddProduct;