import { motion } from 'framer-motion';
import { ShoppingCart, Star, Eye, Heart } from 'lucide-react';
import { useState } from 'react';

export default function Shop({ cartCount, setCartCount }) {
  const [loadingProduct, setLoadingProduct] = useState(null);

  const products = [
    { name: "Neem Soap", price: "₦1,500", rating: 5, category: "Personal Care", image: "/Images/neem_soap.png", desc: "A gentle, antibacterial cleansing bar for daily skin protection." },
    { name: "Neem Face Mask", price: "₦3,200", rating: 5, category: "Personal Care", image: "/Images/neem_face_mask.png", desc: "Neem-infused mask for deep purification and skin protection." },
    { name: "Neem Hair Cream", price: "₦2,800", rating: 4, category: "Personal Care", image: "/Images/neem_hair_cream.png", desc: "Nourishing cream that supports rich, healthy hair growth." },
    { name: "Neem Toothpaste", price: "₦1,200", rating: 5, category: "Personal Care", image: "/Images/neem_toothpaste.png", desc: "Keeps teeth healthy while fighting germs, naturally." },
    { name: "Neem Wipes", price: "₦1,800", rating: 5, category: "Personal Care", image: "/Images/neem_wipes.png", desc: "Antimicrobial wipes offering a safe, chemical-free alternative." },
    { name: "Air Freshener", price: "₦3,500", rating: 4, category: "Home Care", image: "/Images/air_freshener.png", desc: "Neem-based air freshener engineered for natural air purification." },
    { name: "Facial Cream", price: "₦4,500", rating: 5, category: "Personal Care", image: "/Images/facial_cream.png", desc: "Designed to fight acne, brighten complexion, and restore healthy skin." },
    { name: "Water Guard", price: "₦2,000", rating: 5, category: "Environmental", image: "/Images/water_guard.png", desc: "A low-cost, eco-friendly alternative to commercial water disinfectants." },
    { name: "Herbal Tea Bag", price: "₦2,500", rating: 5, category: "Wellness", image: "/Images/herbal_tea_bag.png", desc: "Neem-based herbal tea supporting immunity and detoxification." },
    { name: "Neem Oil Extract", price: "₦5,000", rating: 5, category: "Wellness", image: "/Images/neem_oil_extract.png", desc: "Pure extract valued for antibacterial, antifungal & anti-inflammatory action." }
  ];

  const handleAddToCart = async (product) => {
    setLoadingProduct(product.name);
    try {
      const response = await fetch('/api/index.php', {
        method: 'POST',
        headers: {
          'Content-Type': 'application/json',
        },
        body: JSON.stringify({
          action: 'add_to_cart',
          product_name: product.name,
          product_price: product.price
        }),
      });
      const data = await response.json();
      if (data.success) {
        setCartCount(data.cart_count);
      }
    } catch (error) {
      console.error('Error adding to cart:', error);
    } finally {
      setTimeout(() => {
        setLoadingProduct(null);
      }, 1000);
    }
  };

  return (
    <section id="shop" className="py-32 bg-white relative">
      <div className="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div className="text-center max-w-3xl mx-auto mb-20">
          <span className="text-primary font-bold tracking-wider uppercase text-sm mb-4 block">Our Shop</span>
          <h2 className="text-4xl md:text-5xl font-serif text-primary-dark">Eco-Friendly Products</h2>
          <p className="mt-6 text-text-muted font-light text-lg">High-quality sustainable solutions for your home and community.</p>
        </div>
        
        <div className="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-10">
          {products.map((product, index) => (
            <motion.div
              key={index}
              initial={{ opacity: 0, y: 30 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true }}
              transition={{ duration: 0.8, ease: [0.16, 1, 0.3, 1], delay: index * 0.1 }}
              className="bg-bg-body overflow-hidden border border-primary-light/30 hover:border-primary transition-colors group flex flex-col h-full"
            >
              <div className="relative aspect-[4/3] overflow-hidden bg-white">
                <span className="absolute top-4 left-4 z-10 bg-primary-dark text-white text-xs tracking-wider uppercase px-4 py-2 shadow-sm font-medium">
                  {product.category}
                </span>
                
                <img 
                  src={product.image} 
                  alt={product.name} 
                  className="w-full h-full object-cover group-hover:scale-105 transition-transform duration-1000 ease-[0.16,1,0.3,1]"
                />
                
                {/* Quick actions overlay */}
                <div className="absolute inset-0 bg-primary-dark/40 opacity-0 group-hover:opacity-100 transition-opacity duration-500 flex items-center justify-center gap-4">
                  <button className="w-12 h-12 bg-white flex items-center justify-center text-primary hover:bg-primary hover:text-white transition-colors transform translate-y-4 group-hover:translate-y-0 duration-500">
                    <Heart size={20} strokeWidth={1.5} />
                  </button>
                  <button className="w-12 h-12 bg-white flex items-center justify-center text-primary hover:bg-primary hover:text-white transition-colors transform translate-y-4 group-hover:translate-y-0 duration-500 delay-100">
                    <Eye size={20} strokeWidth={1.5} />
                  </button>
                </div>
              </div>
              
              <div className="p-8 flex flex-col flex-grow">
                <div className="flex text-primary mb-4 gap-1">
                  {[...Array(5)].map((_, i) => (
                    <Star key={i} size={14} fill={i < product.rating ? "currentColor" : "none"} className={i < product.rating ? "" : "text-gray-300"} strokeWidth={1.5} />
                  ))}
                </div>
                
                <h3 className="text-xl font-serif text-primary-dark mb-2">{product.name}</h3>
                <p className="text-sm font-light text-text-muted mb-6 flex-grow">{product.desc}</p>
                
                <div className="flex items-center justify-between mt-auto pt-6 border-t border-primary-light/30">
                  <span className="text-2xl font-light text-text-main">{product.price}</span>
                  <button 
                    onClick={() => handleAddToCart(product)}
                    disabled={loadingProduct === product.name}
                    className="flex items-center gap-2 bg-transparent text-primary hover:text-primary-dark font-medium uppercase tracking-wider text-sm transition-colors disabled:opacity-50 disabled:cursor-not-allowed group/btn"
                  >
                    {loadingProduct === product.name ? (
                      <span className="animate-spin w-5 h-5 border-2 border-primary border-t-transparent rounded-full block"></span>
                    ) : (
                      <>
                        Add <ShoppingCart size={16} className="group-hover/btn:translate-x-1 transition-transform" />
                      </>
                    )}
                  </button>
                </div>
              </div>
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  );
}
