library(rjson);
library(pwr);


x1 <- commandArgs()[5];

xx1 <- fromJSON(x1);

effect_size <- as.numeric(xx1["effect_size"]);
power <- as.numeric(xx1["power"]);
p_value <- as.numeric(xx1["p_value"]);

# result <- pwr.t.test(d = effect_size, power = power, sig.level = p_value);
result <- pwr.chisq.test(w = effect_size,  df=1, sig.level = p_value, power = power)
total_obs <- result$N;
xx1["result_n"] <- total_obs/2;
cat(toJSON(c(xx1["result_n"])));
