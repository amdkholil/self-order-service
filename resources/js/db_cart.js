import { openDB } from 'idb';

const db_name = "gc_db"
const store_name = "cart"

async function getDB(){
    return await openDB(db_name, 1, {
        upgrade(db){
            if(!db.objectStoreNames.contains(store_name)){
                db.createObjectStore(store_name, {keyPath:'id'})
            }
        }, 
        blocked(){
            console.log("local database blocked")
        }
    })
}

export async function addCart(product){
    const db = await getDB()
    return db.add(store_name, product)
}

export async function getAllCart(){
    const db = await getDB()
    return db.getAll(store_name)
}

export async function rmCart(id) {
    const db = await getDB()
    return db.delete(store_name, id)
}

export async function update(id, value) {
    const db = await getDB()
    return db.put(store_name, {id, ...value})    
}